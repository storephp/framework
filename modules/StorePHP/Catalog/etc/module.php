<?php

use StorePHP\Bundler\Lib\Module;
use StorePHP\Catalog\Providers\StoreCatalogServiceProvider;
use StorePHP\Bundler\Contracts\Module\iModule;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Catalog');
        $module->provoiders([
            StoreCatalogServiceProvider::class
        ]);
    }
};
