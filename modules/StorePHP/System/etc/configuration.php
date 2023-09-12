<?php

use StorePHP\Bundler\Lib\Configuration\SubTabs;
use StorePHP\Bundler\Lib\Configuration\Tab;
use StorePHP\Bundler\Lib\Configuration\Fields;

return new class
{
    public function tab(Tab $tab)
    {
        $tab->addTab('general', 'General', 1);
    }

    public function subTabs(SubTabs $sub)
    {
        $sub->addSub('general', 'public', 'Public', 1);
    }

    public function fields(Fields $form)
    {
        $form->addField('text', [
            'label' => 'Store name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
        ], 'public');

        $form->addField('text', [
            'label' => 'Store URL',
            'model' => 'url',
            'rules' => 'required',
            'order' => 10,
        ], 'public');
    }
};
