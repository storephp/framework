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
        return \StorePHP\Dashboard\Models\Admin::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new admin', 'store.dashboard.permissions.admins.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Email', 'email');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'store.dashboard.permissions.admins.update',
        ]);
    }
};
