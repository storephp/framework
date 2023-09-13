<?php

use StorePHP\Bundler\Contracts\Module\iModule;
use StorePHP\Bundler\Lib\Module;
use StorePHPAdmin\Permissions\Providers\StorePHPPermissionsServiceProvider;

return new class implements iModule
{
    public function info(Module $module)
    {
        $module->name('Permissions');
        $module->provoiders([
            StorePHPPermissionsServiceProvider::class
        ]);
    }
};
