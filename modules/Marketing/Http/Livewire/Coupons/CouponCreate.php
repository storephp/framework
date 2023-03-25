<?php

namespace OutMart\Modules\Marketing\Http\Livewire\Coupons;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Dashboard\Builder\Contracts\hasGenerateFields;
use OutMart\Dashboard\Builder\FormBuilder;
use OutMart\Services\Exceptions\Coupon\CouponAlreadyExists;
use OutMart\Support\Facades\Coupon;

class CouponCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Marketing';
    protected $pageTitle = 'Create new coupon';

    public function generateFields($form)
    {
        $form->addField('text', [
            'label' => 'Coupon Name',
            'model' => 'coupon_name',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Coupon Code',
            'model' => 'coupon_code',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('select', [
            'label' => 'Discount Type',
            'model' => 'discount_type',
            'options' => [
                [
                    'label' => 'Percentage',
                    'value' => 'percentage',
                ],
                [
                    'label' => 'Fixed',
                    'value' => 'fixed',
                ],
            ],
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Discount Value',
            'model' => 'discount_value',
            'rules' => 'required',
            'order' => 40,
        ]);

        $form->addField('select', [
            'label' => 'Activity status',
            'model' => 'is_active',
            'options' => [
                [
                    'label' => 'Active',
                    'value' => 1,
                ],
                [
                    'label' => 'Inactive',
                    'value' => 0,
                ],
            ],
            'rules' => 'required',
            'order' => 50,
        ]);
    }

    public function submit()
    {
        try {
            $validatedData = $this->validate();
            Coupon::createNewCoupon($validatedData);
        } catch (CouponAlreadyExists $e) {
            return $this->alert('error', $e->message);
        }

        return $this->alert('success', 'Saved!');
    }
}
