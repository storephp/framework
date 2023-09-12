<?php

use StorePHP\Bundler\Lib\Module;
use StorePHP\Catalog\Providers\StoreCatalogServiceProvider;

return new class
{
    public function info(Module $module)
    {
        $module->name('Catalog');
        $module->provoiders([
            StoreCatalogServiceProvider::class
        ]);
    }
};
