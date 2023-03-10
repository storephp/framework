<?php

namespace OutMart\Modules\Sales\Http\Livewire\Orders;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\DataType\ProductSku;
use OutMart\Models\Basket;
use OutMart\Models\Basket\Quote;
use OutMart\Models\Customer\Address;
use OutMart\Modules\Catalog\Models\Product;
use OutMart\Modules\Customers\Models\Customer;

class OrderCreate extends Component
{
    use LivewireAlert;

    public $customer_id = null;
    public $customer = null;
    public $customerAddress = null;
    public $customerAddresses = null;
    public $customerIntreAddresses = [];

    public $promoCode = null;
    public $AppledpromoCode = null;

    public $basket = null;
    public $basketUlid = null;
    public $basketQuotes = [];
    public $basketSubTotal = 0.00;
    public $basketDiscountTotal = 0.00;
    public $basketTotal = 0.00;

    public function mount(Customer $customer)
    {
        $this->customer_id = $customer->id;

        $this->customer = $customer;

        $this->customerAddresses = $customer->addresses->map(function ($address) {
            return [
                'value' => $address->id,
                'label' => '#' . $address->label . ' - ' . $address->street_line_1,
            ];
        });

        $this->keyCache = md5($customer->id);

        $this->basketUlid = Cache::get($this->keyCache, null);

        if (is_null($this->basketUlid)) {
            $this->basket = $customer->currentBasket();
            Cache::put($this->keyCache, $this->basket->ulid);
        }

        if (!is_null($this->basketUlid)) {
            $this->basket = $customer->currentBasket($this->basketUlid);

            $this->UpdateBasket($this->basket);
        }
    }

    public function render()
    {
        $customers = Customer::get()->map(function ($customer) {
            return [
                'value' => $customer->id,
                'label' => '#' . $customer->id . ' - ' . $customer->first_name . ' ' . $customer->last_name,
            ];
        });

        $products = Product::get();

        return view('outmartSales::orders.create', [
            'customers' => $customers,
            'products' => $products,
        ])->layout(DashboardLayout::class);
    }

    public function addToBacket($sku)
    {
        $this->basket->addQuotes(new ProductSku($sku));
        $this->UpdateBasket($this->basket);
    }

    public function UpdateBasket($basket)
    {
        $basket = Basket::whereUlid($this->basketUlid)->first();

        if ($basket) {
            $this->promoCode = $basket->coupon_code;
            $this->AppledpromoCode = $basket->coupon_code;

            $this->basketQuotes = $basket->quotes;
            $this->basketSubTotal = $basket->getSubTotal();
            $this->basketDiscountTotal = $basket->getDiscountTotal();
            $this->basketTotal = $basket->getTotal();
        }
    }

    public function applyCoupon()
    {
        $this->validate([
            'promoCode' => 'required',
        ]);

        $this->basket->applyCoupon($this->promoCode);
        $this->UpdateBasket($this->basket);
    }

    public function restCoupon()
    {
        $this->basket->resetCoupon();
        $this->UpdateBasket($this->basket);
    }

    public function selectCustomer()
    {
        $this->customerAddresses = Address::where('customer_id', $this->customer_id)->get()->map(function ($address) {
            return [
                'value' => $address->id,
                'label' => '#' . $address->label . ' - ' . $address->street_line_1,
            ];
        });
    }

    public function selectAddress()
    {
        // dd($this->customerAddress);
        $addt = Address::find($this->customerAddress);

        // dd($addt->label);

        $this->customerIntreAddresses = [
            'label' => $addt->label,
            'country_code' => $addt->country_code,
            'city_id' => $addt->city_id,
            'postcode' => $addt->postcode,
            'street_line_1' => $addt->street_line_1,
            'street_line_2' => $addt->street_line_2,
            'telephone_number' => $addt->telephone_number,
        ];

        // dd($this->customerAddresses);

        // customerIntreAddresses
    }

    public function increase(Quote $quote)
    {
        $quote->increase(1);
        $this->UpdateBasket($this->basket);
    }

    public function decrease(Quote $quote)
    {
        $quote->decrease(1);
        $this->UpdateBasket($this->basket);
    }

    public function placeOrder()
    {
        $this->validate([
            'customerIntreAddresses.label' => 'required',
            'customerIntreAddresses.country_code' => 'required',
            'customerIntreAddresses.city_id' => 'required',
            'customerIntreAddresses.postcode' => 'required',
            'customerIntreAddresses.street_line_1' => 'required',
            'customerIntreAddresses.telephone_number' => 'required',
        ]);
        
        $order = $this->basket->placeOrder($this->customerAddress);
        Cache::delete($this->keyCache);

        return redirect()->route('outmart.dashboard.sales.orders.show', [$order]);
    }
}
