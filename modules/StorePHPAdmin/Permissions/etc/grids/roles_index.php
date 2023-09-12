<?php

use StorePHP\Bundler\Lib\Grid\{
    CTA,
    Table,
    Bottom
};

return new class
{
    public function model()
    {
        return \OutMart\Team\Models\Rule::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new rule', 'store.dashboard.permissions.roles.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Rule code', 'rule_code');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'store.dashboard.permissions.roles.update',
        ]);
    }
};
