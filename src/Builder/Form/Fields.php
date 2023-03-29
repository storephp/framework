<?php

namespace OutMart\Dashboard\Builder\Form;

use Exception;

class Fields
{
    private $fields = [];

    public function addField($type = 'text', $attributes)
    {
        $attributes = match($type) {
            'text' => $this->handleText($attributes),
            'textarea' => $this->handleTextArea($attributes),
            'price' => $this->handlePrice($attributes),
            'file' => $this->handleFile($attributes),
            'select' => $this->handleSelect($attributes),
        };

        $this->fields[] = $attributes;
    }

    /**
     * Get the value of fields
     */
    public function getFields()
    {
        return array_map(function ($field) {
            $field['hint'] = (isset($field['hint'])) ? $field['hint'] : null;
            return $field;
        }, $this->fields);
    }
    
    private function handleText($attributes)
    {
        $attributes['type'] = 'text';
        return $this->falterAttributes($attributes);
    }

    private function handleTextArea($attributes)
    {
        $attributes['type'] = 'textarea';
        return $this->falterAttributes($attributes);
    }

    private function handlePrice($attributes)
    {
        $attributes['type'] = 'price';
        return $this->falterAttributes($attributes);
    }

    private function handleFile($attributes)
    {
        $attributes['type'] = 'file';
        return $this->falterAttributes($attributes);
    }

    private function handleSelect($attributes)
    {
        $keysAttributes = array_keys($attributes);

        if (!in_array('options', $keysAttributes)) {
            throw new Exception('The ' . $attributes['model'] . ' field must contain the options', 1);
        }

        $attributes['type'] = 'select';
        $attributes['multiple'] = $attributes['multiple'] ?? false;
        return $this->falterAttributes($attributes);
    }

    private function falterAttributes($attributes)
    {
        $attributes['tab'] = $attributes['tab'] ?? 'basic';
        return $attributes;
    }
}
