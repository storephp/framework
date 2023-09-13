<?php

use StorePHP\Customers\Providers\StorePHPCustomersServiceProvider;
use StorePHP\Bundler\Lib\Module;
use StorePHP\Bundler\Contracts\Module\iModule;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Customers');
        $module->provoiders([
            StorePHPCustomersServiceProvider::class
        ]);
    }
};
