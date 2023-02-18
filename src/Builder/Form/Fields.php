<?php

namespace OutMart\Dashboard\Builder\Form;

class Fields
{
    private $fields = [];

    public function addField($attributes)
    {
        $this->fields[] = $attributes;
    }

    /**
     * Get the value of fields
     */
    public function getFields()
    {
        return $this->fields;
    }
}
