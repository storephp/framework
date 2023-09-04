<?php

namespace Store\Modules\StorePHP\Customers\Http\Livewire;

use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;
use Store\Support\Facades\Customer;

class CustomerUpdate extends FromAbstract
{
    protected $pretitle = 'Customers';
    protected $title = 'Create new customer';

    public $customer = null;
    public $formId = 'storephp_customers_customer_form';

    public function mount($customer)
    {
        $this->customer = Customer::setCustomerId($customer)->getData();

        foreach ($this->models() as $model) {
            $this->{$model} = $this->customer[$model];
        }
    }

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        foreach ($this->models() as $model) {
            $this->customer->{$model} = $validateData[$model];
        }

        $this->customer->save();

        return $this->pushAlert('success', 'The customer has been updated');
    }
}
