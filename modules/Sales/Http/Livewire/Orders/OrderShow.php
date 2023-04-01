<?php

namespace OutMart\Modules\Sales\Http\Livewire\Orders;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\Models\Order;

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
        }, config('outmart.dashboard.orders.actions', []));

        // dd($components);

        return view('outmartSales::orders.show', [
            'order' => $this->order,
            'componentButtonActions' => $components,
        ])->layout(DashboardLayout::class);
    }

}
