<?php

namespace Basketin\Modules\Sales\Http\Livewire\Orders;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Basketin\Dashboard\Views\Layouts\DashboardLayout;
use Basketin\Models\Order;

class OrderShow extends Component
{
    use LivewireAlert;

    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        $components = array_map(function ($component) {
            return $component['component'];
        }, config('basketin.dashboard.orders.actions', []));

        // dd($components);

        return view('basketinSales::orders.show', [
            'order' => $this->order,
            'componentButtonActions' => $components,
        ])->layout(DashboardLayout::class);
    }

}
