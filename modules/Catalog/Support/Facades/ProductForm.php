<?php

namespace Store\Modules\Catalog\Support\Facades;

use Illuminate\Support\Facades\Facade;

class ProductForm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'addFieldToProduct';
    }
}
