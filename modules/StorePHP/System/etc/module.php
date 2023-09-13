<?php

use StorePHP\System\Configuration\Providers\StoreSystemConfigurationServiceProvider;
use StorePHP\Bundler\Lib\Module;
use StorePHP\Bundler\Contracts\Module\iModule;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Configuration');
        $module->provoiders([
            StoreSystemConfigurationServiceProvider::class
        ]);
    }
};
