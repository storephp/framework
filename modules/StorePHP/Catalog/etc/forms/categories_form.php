<?php

use StorePHP\Bundler\Lib\Form\Fields;
use StorePHP\Bundler\Lib\Form\Tabs;
use Store\Models\Product\Category;

return new class
{
    public function tabs(Tabs $tabs)
    {
        // $tabs->addTab('info', 'Info');
    }

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
