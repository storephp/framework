<?php

namespace Store\Modules\Catalog\Support\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryForm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'addFieldToCategory';
    }
}
