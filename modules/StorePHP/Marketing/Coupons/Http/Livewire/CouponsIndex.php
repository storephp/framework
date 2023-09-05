<?php

namespace Store\Modules\StorePHP\Marketing\Coupons\Http\Livewire;

use StorePHP\Bundler\Abstracts\GridAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CouponsIndex extends GridAbstract
{
    public $gridId = 'storephp_marketing_coupons_index';

    protected $pretitle = 'Marketing';
    protected $title = 'Coupons listing';

    public function layout()
    {
        return DashboardLayout::class;
    }
}
