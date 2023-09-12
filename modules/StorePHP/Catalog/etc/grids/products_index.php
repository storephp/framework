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
        return config('store.catalog.products.model');
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new product', 'store.dashboard.catalog.products.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Slug', 'slug');
        // ->setColumn('Type', 'type')
        // ->setColumn('Mobile', 'mobile');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'store.dashboard.catalog.products.update',
        ]);
    }
};
