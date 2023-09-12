<?php

use StorePHP\Dashboard\Providers\StorePHPDashboardServiceProvider;
use StorePHP\Bundler\Lib\Module;

return new class
{
    public function info(Module $module)
    {
        $module->name('Dashboard');
        $module->provoiders([
            StorePHPDashboardServiceProvider::class
        ]);
    }
};
