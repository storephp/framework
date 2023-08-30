<?php

namespace Store\Modules\Catalog\Support\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryFormTabs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'addTabToCategory';
    }
}
