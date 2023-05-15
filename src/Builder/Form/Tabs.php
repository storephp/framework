<?php

namespace Store\Dashboard\Builder\Form;

use Illuminate\Support\Str;

class Tabs
{
    private $tabs = [];

    public function addTab($attributes)
    {
        $this->tabs[] = $attributes;
    }

    public function mergeTabs($tabs)
    {
        $this->tabs = array_merge($this->tabs, $tabs);
    }

    /**
     * Get the value of fields
     */
    public function getTabs()
    {
        if (empty($this->tabs)) {
            $this->tabs[] = [
                'id' => 'basic',
                'name' => 'basic info',
            ];
        }

        return array_map(function ($attribute) {
            $attribute['id'] = (isset($attribute['id'])) ? Str::slug($attribute['id'], '.') : 'basic';
            $attribute['name'] = Str::ucfirst($attribute['name']);
            return $attribute;
        }, $this->tabs);
    }
}
