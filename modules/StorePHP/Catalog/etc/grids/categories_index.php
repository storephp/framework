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
        return config('store.catalog.categories.model');
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new category', 'store.dashboard.catalog.categories.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Slug', 'slug');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'store.dashboard.catalog.categories.update',
        ]);
    }
};
