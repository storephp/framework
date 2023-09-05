<?php

namespace Store\Modules\StorePHP\Marketing\Coupons\Http\Livewire;

use Store\Support\Exceptions\Coupon\CouponNotFound;
use Store\Support\Facades\Coupon;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CouponUpdate extends FromAbstract
{
    protected $pretitle = 'Marketing';
    protected $title = 'Create new coupon';

    public $formId = 'storephp_marketing_coupon_form';
    public $coupon = null;

    public function mount($coupon)
    {
        try {
            $this->coupon = Coupon::getCouponById($coupon);
        } catch (CouponNotFound $e) {
            abort(403, $e->getMessage());
        }

        foreach ($this->models() as $model) {
            $this->{$model} = $this->coupon[$model];
        }
    }

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        foreach ($this->models() as $model) {
            $this->coupon->{$model} = $validateData[$model];
        }

        $this->coupon->save();

        return $this->pushAlert('success', 'The coupon has been updated');
    }
}
