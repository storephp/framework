<?php

namespace Store\Modules\StorePHP\Marketing\Coupons\Http\Livewire;

use Store\Support\Exceptions\Coupon\CouponAlreadyExists;
use Store\Support\Facades\Coupon;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class CouponCreate extends FromAbstract
{
    protected $pretitle = 'Marketing';
    protected $title = 'Create new coupon';

    public $formId = 'storephp_marketing_coupon_form';

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        try {
            $validateData = $this->validate();
            Coupon::createNewCoupon($validateData);
        } catch (CouponAlreadyExists $e) {
            return $this->pushAlert('error', $e->getMessage());
        }

        return $this->pushAlert('success', 'The coupon has been created');
    }
}
