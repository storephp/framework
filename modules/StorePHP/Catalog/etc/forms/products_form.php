<?php

use StorePHP\Bundler\Lib\Form\Fields;
use StorePHP\Bundler\Lib\Form\Tabs;
use Store\Models\Product\Category;

return new class
{
    public function tabs(Tabs $tabs)
    {
        $tabs->addTab('default', 'Product info');
        $tabs->addTab('priceing', 'Product price');
        $tabs->addTab('images', 'Images');
    }

    public function fields(Fields $form)
    {
        $form->addField('select', [
            'label' => 'Categories',
            'model' => 'categories',
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
            'label' => 'Product name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Product slug',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Product sku',
            'model' => 'sku',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('textarea', [
            'label' => 'Product description',
            'model' => 'description',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('select', [
            'label' => 'Status',
            'model' => 'status',
            'options' => [
                [
                    'label' => 'Enabled',
                    'value' => 1,
                ],
                [
                    'label' => 'Disabled',
                    'value' => 0,
                ],
            ],
            'rules' => 'required',
            'order' => 50,
        ]);

        $form->addField('text', [
            'label' => 'Product price',
            'model' => 'price',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ], 'priceing');

        $form->addField('text', [
            'label' => 'Product discount price',
            'model' => 'discount_price',
            'rules' => 'nullable',
            'order' => 20,
            'hint' => 'dsf dsf dsff',
        ], 'priceing');

        $form->addField('file', [
            'label' => 'Product thumbnail',
            'model' => 'thumbnail_path',
            'rules' => 'required',
            'order' => 10,
            // 'hint' => 'dsf dsf dsff',
        ], 'images');
    }
};
