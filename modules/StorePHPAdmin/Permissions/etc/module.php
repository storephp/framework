<?php

use StorePHPAdmin\Permissions\Providers\StorePHPPermissionsServiceProvider;
use StorePHP\Bundler\Lib\Module;

return new class
{
    public function info(Module $module)
    {
        $module->name('Permissions');
        $module->provoiders([
            StorePHPPermissionsServiceProvider::class
        ]);
    }
};
