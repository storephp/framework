<?php

namespace StorePHP\Customers\Http\Livewire;

use StorePHP\Bundler\Abstracts\GridAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CustomersIndex extends GridAbstract
{
    public $gridId = 'storephp_customers_customers_index';

    protected $pretitle = 'Customers';
    protected $title = 'Customers listing';

    public function layout()
    {
        return DashboardLayout::class;
    }
}
