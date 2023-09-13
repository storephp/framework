<?php

use StorePHP\Marketing\Coupons\Providers\StoreMarketingCouponsServiceProvider;
use StorePHP\Bundler\Lib\Module;
use StorePHP\Bundler\Contracts\Module\iModule;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Marketing');
        $module->provoiders([
            StoreMarketingCouponsServiceProvider::class
        ]);
    }
};
