<?php

namespace StorePHP\Dashboard\Builder\Abstracts;

use StorePHP\Dashboard\Builder\Form\Fields;

class AppendFields
{
    public $configPath = null;

    public $fields = [];

    /**
     * Get the value of fields
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Set the value of fields
     *
     */
    public function setFields($callback)
    {
        $fields = new Fields;

        $callback($fields);

        $fillables = [];

        foreach ($fields->getFields() as $field) {
            $fillables[] = $field['model'];
        }

        config([
            $this->configPath =>
            array_merge($fillables, config($this->configPath, [])),
        ]);

        $this->fields = array_merge($this->fields, $fields->getFields());
    }
}
