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
