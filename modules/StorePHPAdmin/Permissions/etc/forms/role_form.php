<?php

use StorePHP\Bundler\Facades\Bundles;
use StorePHP\Bundler\Lib\Form\Fields;
use StorePHP\Bundler\Lib\Form\Tabs;

return new class
{
    public function tabs(Tabs $tabs)
    {
        $tabs->addTab('default', 'Rule info');
    }

    public function fields(Fields $form)
    {
        $form->addField('text', [
            'label' => 'Rule code',
            'model' => 'rule_code',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('select', [
            'label' => 'Permissions',
            'model' => 'permissions',
            'multiple' => true,
            'options' => array_map(function ($permission) {
                return [
                    'label' => $permission['label'],
                    'value' => $permission['key'],
                ];
            }, Bundles::getPermissions()),
            'rules' => 'nullable',
            'order' => 20,
        ]);

        $form->addField('checkbox', [
            'label' => '',
            'model' => 'all_permissions',
            'rules' => 'nullable',
            'order' => 30,
            'hint' => 'Give access as root',
        ]);
    }
};
