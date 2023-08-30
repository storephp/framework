<?php

namespace Store\Modules\Catalog\Support\Facades;

use Illuminate\Support\Facades\Facade;

class ProductFormTabs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'addTabToProduct';
    }
}
