<?php

namespace Bidaea\OutMart\Dashboard\Http\Livewire\Customers;

use Bidaea\OutMart\Facades\Customer;
use Livewire\Component;

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
