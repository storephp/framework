<?php

use StorePHP\Bundler\Contracts\Grid\GridHasButtons;
use StorePHP\Bundler\Contracts\Grid\GridHasCTA;
use StorePHP\Bundler\Contracts\Grid\GridHasTable;
use StorePHP\Bundler\Lib\Grid\Bottom;
use StorePHP\Bundler\Lib\Grid\CTA;
use StorePHP\Bundler\Lib\Grid\Table;

return new class implements GridHasTable, GridHasButtons, GridHasCTA
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
