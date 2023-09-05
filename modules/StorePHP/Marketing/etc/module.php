<?php

use Store\Modules\StorePHP\Marketing\Coupons\Providers\StoreMarketingCouponsServiceProvider;
use StorePHP\Bundler\Lib\Module;

return new class
{
    public function info(Module $module)
    {
        $module->name('Marketing');
        $module->provoiders([
            StoreMarketingCouponsServiceProvider::class
        ]);
    }
};
