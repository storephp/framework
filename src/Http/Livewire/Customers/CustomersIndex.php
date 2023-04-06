<?php

namespace Basketin\Dashboard\Http\Livewire\Customers;

use Livewire\Component;
use Basketin\Dashboard\Models\Customer;

class CustomersIndex extends Component
{
    public function render()
    {
        $customers = Customer::query()->paginate(15);

        return view('basketin::customers.index', [
            'customers' => $customers,
        ])->layout('basketin::layouts.dashboard');
    }
}
