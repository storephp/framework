<?php

namespace OutMart\Dashboard\Http\Livewire\Customers;

use Livewire\Component;
use OutMart\Dashboard\Models\Customer;

class CustomersIndex extends Component
{
    public function render()
    {
        $customers = Customer::query()->paginate(15);

        return view('outmart::customers.index', [
            'customers' => $customers,
        ])->layout('outmart::layouts.dashboard');
    }
}
