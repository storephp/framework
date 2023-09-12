<?php

use StorePHP\Sales\Orders\Providers\StoreSalesOrdersServiceProvider;
use StorePHP\Bundler\Lib\Module;

return new class
{
    public function info(Module $module)
    {
        $module->name('Sales');
        $module->provoiders([
            StoreSalesOrdersServiceProvider::class
        ]);
    }
};
