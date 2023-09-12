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
        return config('store.customers.model');
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new customer', 'store.dashboard.customers.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('First name', 'first_name')
            ->setColumn('Last name', 'last_name')
            ->setColumn('Email', 'email');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'store.dashboard.customers.update',
        ]);
    }
};
