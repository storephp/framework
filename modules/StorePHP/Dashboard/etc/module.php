<?php

use StorePHP\Dashboard\Providers\StorePHPDashboardServiceProvider;
use StorePHP\Bundler\Lib\Module;
use StorePHP\Bundler\Contracts\Module\iModule;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Dashboard');
        $module->provoiders([
            StorePHPDashboardServiceProvider::class
        ]);
    }
};
