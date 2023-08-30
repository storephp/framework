<?php

namespace Store\Modules\Sales\Http\Livewire\Orders;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;
use Store\Models\Order;

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
        }, config('store.dashboard.orders.actions', []));

        // dd($components);

        return view('storeSales::orders.show', [
            'order' => $this->order,
            'componentButtonActions' => $components,
        ])->layout(DashboardLayout::class);
    }

}
