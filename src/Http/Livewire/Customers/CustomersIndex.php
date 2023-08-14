<?php

namespace StorePHP\Dashboard\Http\Livewire\Customers;

use Livewire\Component;
use StorePHP\Dashboard\Models\Customer;

class CustomersIndex extends Component
{
    public function render()
    {
        $customers = Customer::query()->paginate(15);

        return view('store::customers.index', [
            'customers' => $customers,
        ])->layout('store::layouts.dashboard');
    }
}
