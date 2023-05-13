<?php

namespace Store\Modules\Catalog\Support;

use Store\Dashboard\Builder\Form\Fields;

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
            'store.catalog.products.external_fillable_entry' =>
            array_merge($fillables, config('store.catalog.products.external_fillable_entry', [])),
        ]);

        static::$fields = array_merge(static::$fields, $fields->getFields());
    }
}