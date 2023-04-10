<?php

namespace Basketin\Modules\Catalog\Support;

use Basketin\Dashboard\Builder\Form\Fields;

class AddFieldToProduct
{
    public static $fields = [];

    /**
     * Get the value of fields
     */
    public static function getFields()
    {
        return static::$fields;
    }

    /**
     * Set the value of fields
     *
     */
    public static function setFields($callback)
    {
        $fields = new Fields;

        $callback($fields);

        $fillables = [];

        foreach ($fields->getFields() as $field) {
            $fillables[] = $field['model'];
        }

        config([
            'basketin.catalog.products.external_fillable_entry' =>
            array_merge($fillables, config('basketin.catalog.products.external_fillable_entry', [])),
        ]);

        static::$fields = array_merge(static::$fields, $fields->getFields());
    }
}
