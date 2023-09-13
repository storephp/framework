<?php

use StorePHP\Bundler\Lib\Form\Fields;
use Store\Models\Product\Category;
use StorePHP\Bundler\Contracts\Form\FormHasFields;

return new class implements FormHasFields
{
    public function fields(Fields $form)
    {
        $form->addField('select', [
            'label' => 'Parent category',
            'model' => 'parent_id',
            'options' => [
                'model' => Category::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'nullable',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Name category',
            'model' => 'name',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Slug category',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 30,
        ]);
    }
};
