<?php

use StorePHP\Bundler\Contracts\Grid\GridHasButtons;
use StorePHP\Bundler\Contracts\Grid\GridHasCTA;
use StorePHP\Bundler\Contracts\Grid\GridHasTable;
use StorePHP\Bundler\Lib\Grid\Bottom;
use StorePHP\Bundler\Lib\Grid\CTA;
use StorePHP\Bundler\Lib\Grid\Table;

return new class implements GridHasTable, GridHasButtons, GridHasCTA
{
    protected string $model = \Store\Models\Basket\Coupon::class;

    public function model()
    {
        return \Store\Models\Basket\Coupon::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new coupon', 'store.dashboard.marketing.coupons.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Coupon name', 'coupon_name')
            ->setColumn('Coupon code', 'coupon_code')
            ->setColumn('Type', 'discount_type')
            ->setColumn('Value', 'discount_value');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'store.dashboard.marketing.coupons.update',
        ]);
    }
};
