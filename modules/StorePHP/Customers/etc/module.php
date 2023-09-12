<?php

use StorePHP\Customers\Providers\StorePHPCustomersServiceProvider;
use StorePHP\Bundler\Lib\Module;

return new class
{
    public function info(Module $module)
    {
        $module->name('Customers');
        $module->provoiders([
            StorePHPCustomersServiceProvider::class
        ]);
    }
};
