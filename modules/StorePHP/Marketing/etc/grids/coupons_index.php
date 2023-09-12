<?php

use StorePHP\Bundler\Lib\Grid\{
    CTA,
    Table,
    Bottom
};

return new class
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
