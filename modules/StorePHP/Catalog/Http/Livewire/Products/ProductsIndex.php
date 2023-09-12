<?php

namespace StorePHP\Catalog\Http\Livewire\Products;

use StorePHP\Bundler\Abstracts\GridAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class ProductsIndex extends GridAbstract
{
    public $gridId = 'storephp_catalog_products_index';

    protected $pretitle = 'Catalog';
    protected $title = 'Products listing';

    public function layout()
    {
        return DashboardLayout::class;
    }
}
