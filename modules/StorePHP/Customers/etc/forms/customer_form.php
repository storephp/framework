<?php

use StorePHP\Bundler\Lib\Form\Fields;
use StorePHP\Bundler\Lib\Form\Tabs;

return new class
{
    public function tabs(Tabs $tabs)
    {
        $tabs->addTab('default', 'Customer info');
    }

    public function fields(Fields $form)
    {
        $form->addField('text', [
            'label' => 'First name',
            'model' => 'first_name',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Last name',
            'model' => 'last_name',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'required',
            'order' => 30,
        ]);
    }
};
