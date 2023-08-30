<?php

namespace Store\Modules\Marketing\Http\Livewire\Coupons;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateFields;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateTabs;
use StorePHP\Dashboard\Builder\FormBuilder;
use Store\Services\Exceptions\Coupon\CouponAlreadyExists;
use Store\Support\Facades\Coupon;

class CouponCreate extends FormBuilder implements hasGenerateTabs, hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Marketing';
    protected $pageTitle = 'Create new coupon';

    public function generateTabs($tabs)
    {
        $tabs->addTab([
            'id' => 'basic',
            'name' => 'Basic info',
        ]);

        $tabs->addTab([
            'id' => 'action',
            'name' => 'Action',
        ]);

        $tabs->addTab([
            'id' => 'Report',
            'name' => 'Report',
            'render' => 'storeMarketing::coupons.coubon'
        ]);
    }

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
            'tab' => 'action',
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
            'tab' => 'action',
            'label' => 'Discount Value',
            'model' => 'discount_value',
            'rules' => 'required',
            'order' => 40,
        ]);

        $form->addField('date', [
            'label' => 'From date',
            'model' => 'start_at',
            'rules' => 'nullable',
            'order' => 50,
        ]);

        $form->addField('date', [
            'label' => 'To date',
            'model' => 'ends_at',
            'rules' => 'nullable',
            'order' => 60,
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
            'order' => 70,
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
