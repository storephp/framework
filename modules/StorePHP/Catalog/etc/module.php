<?php

use Store\Modules\StorePHP\Catalog\Providers\StoreCatalogServiceProvider;
use StorePHP\Bundler\Lib\Module;

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
