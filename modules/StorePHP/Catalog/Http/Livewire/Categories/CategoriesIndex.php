<?php

namespace Store\Modules\StorePHP\Catalog\Http\Livewire\Categories;

use StorePHP\Bundler\Abstracts\GridAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CategoriesIndex extends GridAbstract
{
    public $gridId = 'storephp_catalog_categories_index';

    protected $pretitle = 'Catalog';
    protected $title = 'Categories listing';

    public function layout()
    {
        return DashboardLayout::class;
    }
}
