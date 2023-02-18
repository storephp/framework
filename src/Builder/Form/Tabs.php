<?php

namespace OutMart\Dashboard\Builder\Form;

use Illuminate\Support\Str;

class Tabs
{
    private $tabs = [];

    public function addTab($attributes)
    {
        $this->tabs[] = $attributes;
    }

    /**
     * Get the value of fields
     */
    public function getTabs()
    {
        return array_map(function ($attribute) {
            $attribute['id'] = Str::slug($attribute['id'], '.');
            $attribute['name'] = Str::ucfirst($attribute['name']);
            return $attribute;
        }, $this->tabs);
    }
}
