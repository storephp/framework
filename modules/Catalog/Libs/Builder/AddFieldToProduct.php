<?php

namespace Store\Modules\Catalog\Libs\Builder;

use StorePHP\Dashboard\Builder\Abstracts\AppendFields;

class AddFieldToProduct extends AppendFields
{
    public $configPath = 'store.catalog.products.external_fillable_entry';
}
