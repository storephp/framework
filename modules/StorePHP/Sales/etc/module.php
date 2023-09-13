<?php

use StorePHP\Sales\Orders\Providers\StoreSalesOrdersServiceProvider;
use StorePHP\Bundler\Lib\Module;
use StorePHP\Bundler\Contracts\Module\iModule;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Sales');
        $module->provoiders([
            StoreSalesOrdersServiceProvider::class
        ]);
    }
};
