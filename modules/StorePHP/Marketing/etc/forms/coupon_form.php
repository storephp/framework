<?php

use StorePHP\Bundler\Lib\Form\Fields;
use StorePHP\Bundler\Lib\Form\Tabs;

return new class
{
    public function tabs(Tabs $tabs)
    {
        $tabs->addTab('default', 'Coupon info');
        $tabs->addTab('action', 'Action');
    }

    // coupon_name
    // coupon_code
    // discount_type
    // discount_value
    // condition
    // condition_data
    // start_at
    // ends_at
    // is_active

    public function fields(Fields $form)
    {
        $form->addField('text', [
            'label' => 'Coupon name',
            'model' => 'coupon_name',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Coupon code',
            'model' => 'coupon_code',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('select', [
            'label' => 'Discount type',
            'model' => 'discount_type',
            'options' => [
                [
                    'label' => 'Percentage',
                    'value' => 'percentage',
                ],
                [
                    'label' => 'Fixed',
                    'value' => 'fixed',
                ],
            ],
            'rules' => 'required',
            'order' => 50,
        ], 'action');

        $form->addField('text', [
            'label' => 'Discount value',
            'model' => 'discount_value',
            'rules' => 'required',
            'order' => 10,
        ], 'action');

        $form->addField('select', [
            'label' => 'Condition',
            'model' => 'condition',
            'options' => [
                [
                    'label' => 'Active',
                    'value' => true,
                ],
                [
                    'label' => 'Inactive',
                    'value' => false,
                ],
            ],
            'rules' => 'nullable',
            'order' => 50,
        ], 'action');

        $form->addField('text', [
            'label' => 'Condition data',
            'model' => 'condition_data',
            'rules' => 'nullable',
            'order' => 10,
        ], 'action');

        $form->addField('date', [
            'label' => 'Start at',
            'model' => 'start_at',
            'rules' => 'nullable',
            'order' => 10,
        ]);

        $form->addField('date', [
            'label' => 'Ends at',
            'model' => 'ends_at',
            'rules' => 'nullable',
            'order' => 10,
        ]);

        $form->addField('select', [
            'label' => 'Active',
            'model' => 'is_active',
            'options' => [
                [
                    'label' => 'Active',
                    'value' => true,
                ],
                [
                    'label' => 'Inactive',
                    'value' => false,
                ],
            ],
            'rules' => 'required',
            'order' => 50,
        ]);
    }
};
