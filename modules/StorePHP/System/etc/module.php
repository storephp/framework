<?php

use StorePHP\System\Configuration\Providers\StoreSystemConfigurationServiceProvider;
use StorePHP\Bundler\Lib\Module;

return new class
{
    public function info(Module $module)
    {
        $module->name('Configuration');
        $module->provoiders([
            StoreSystemConfigurationServiceProvider::class
        ]);
    }
};
