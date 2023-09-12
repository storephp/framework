<?php

namespace StorePHP\Customers\Http\Livewire;

use Store\Support\Facades\Product;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;
use Store\Support\Facades\Customer;

class CustomerCreate extends FromAbstract
{
    protected $pretitle = 'Customers';
    protected $title = 'Create new customer';

    public $formId = 'storephp_customers_customer_form';

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        Customer::create($validateData);

        return $this->pushAlert('success', 'The customer has been created');
    }
}
