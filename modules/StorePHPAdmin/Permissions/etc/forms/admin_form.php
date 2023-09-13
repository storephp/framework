<?php

use OutMart\Team\Models\Rule;
use StorePHP\Bundler\Contracts\Form\FormHasFields;
use StorePHP\Bundler\Contracts\Form\FormHasTabs;
use StorePHP\Bundler\Lib\Form\Fields;
use StorePHP\Bundler\Lib\Form\Tabs;

return new class implements FormHasTabs, FormHasFields
{
    public function tabs(Tabs $tabs)
    {
        $tabs->addTab('default', 'Admin info');
    }

    public function fields(Fields $form)
    {
        $form->addField('select', [
            'label' => 'Select Rule',
            'model' => 'rule_id',
            'options' => [
                'model' => Rule::class,
                'row' => [
                    'label' => 'rule_code',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            // 'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'required',
            'order' => 30,
        ]);

        $form->addField('text', [
            'label' => 'Password',
            'model' => 'password',
            'rules' => 'required',
            'order' => 40,
        ]);
    }
};
