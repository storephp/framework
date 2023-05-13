<?php

namespace Store\Modules\Sales\Http\Livewire\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use Store\Dashboard\Views\Layouts\DashboardLayout;
use Store\Models\Order;

class OrdersIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $orders = Order::with('customer')->where(function ($q) {
            if ($this->search) {
                $q->where('sku', 'like', '%' . $this->search . '%')
                    ->orByEntry('name', 'like', '%' . $this->search . '%');
            }
        })->paginate(15);

        // dd($orders);

        return view('storeSales::orders.index', [
            'orders' => $orders,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Product $product)
    {
        return ($product->delete()) ? 'done' : 'error';
    }
}
