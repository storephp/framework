<?php

namespace Store\Modules\Sales\Http\Livewire\Orders;

use Illuminate\Support\Facades\Cache;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Store\Dashboard\Views\Layouts\DashboardLayout;
use Store\Models\Basket\Quote;
use Store\Models\Customer\Address;
use Store\Modules\Catalog\Models\Product;
use Store\Modules\Customers\Models\Customer;
use Store\Support\Services\BasketService;
use Store\Support\Services\CustomerService;
use Store\Support\Services\OrderService;

class OrderCreate extends Component
{
    use LivewireAlert;

    private $basket = null;
    private $orderService = null;
    private $customerService = null;

    public $customer_id = null;
    public $customer = null;
    public $customerAddress = null;
    public $customerAddresses = null;
    public $customerIntreAddresses = [];

    public $promoCode = null;
    public $AppledpromoCode = null;

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
    }

    public function booted(BasketService $basketService, OrderService $orderService, CustomerService $customerService)
    {
        $this->keyCache = md5($this->customer_id);
        $this->basketUlid = Cache::get($this->keyCache, null);

        $this->basket = $basketService->initBasket($this->basketUlid);
        if (is_null($this->basketUlid)) {
            Cache::put($this->keyCache, $this->basket->getUlid());
        }

        $this->UpdateBasket($this->basket);

        $this->orderService = $orderService;
        $this->customerService = $customerService;
        $this->customerService->setCustomerId($this->customer_id);

        // dd($this->basket->getUlid());

        // $this->basket->setShippingTotal(30);

        // $this->total = $this->basket->getTotal();
        // $this->subTotal = $this->basket->getSubTotal();
        // $this->discountTotal = $this->basket->getDiscountTotal();
        // $this->shippingTotal = $this->basket->getShippingTotal();
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

        return view('storeSales::orders.create', [
            'customers' => $customers,
            'products' => $products,
        ])->layout(DashboardLayout::class);
    }

    public function addToBacket($sku)
    {
        $this->basket->addQuotes($sku);
        $this->UpdateBasket($this->basket);
    }

    public function UpdateBasket($basket)
    {
        if ($basket) {
            $this->promoCode = $basket->getCoupon()?->coupon_code;
            $this->AppledpromoCode = $basket->getCoupon()?->coupon_code;

            $this->basketQuotes = $basket->getQuotes();
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
        $this->basket->increase($quote, 1);
        $this->UpdateBasket($this->basket);
    }

    public function decrease(Quote $quote)
    {
        $this->basket->decrease($quote, 1);
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

        $initOrder = $this->orderService->initOrder($this->basket, $this->customerService);

        $orderPlaced = $initOrder->placeOrder();
        $orderPlaced->updateStatus('pending');
        Cache::delete($this->keyCache);
        $order = $orderPlaced->getOrder();

        return redirect()->route('store.dashboard.sales.orders.show', [$order]);
    }
}
