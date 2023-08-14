<?php

namespace Store\Modules\Marketing\Http\Livewire\Coupons;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateFields;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateTabs;
use StorePHP\Dashboard\Builder\FormBuilder;
use Store\Support\Facades\Coupon;

class CouponUpdate extends FormBuilder implements hasGenerateTabs, hasGenerateFields
{
    use LivewireAlert;

    public $coupon_id;
    public $coupon_name;
    public $coupon_code;
    public $discount_type;
    public $discount_value;
    public $is_active;

    protected $pagePretitle = 'Marketing';
    protected $pageTitle = 'Update this coupon';

    public function mount($id)
    {
        $coupon = Coupon::getCouponById($id);

        $this->coupon_id = $coupon->id;
        $this->coupon_name = $coupon->coupon_name;
        $this->coupon_code = $coupon->coupon_code;
        $this->discount_type = $coupon->discount_type;
        $this->discount_value = $coupon->discount_value;
        $this->start_at = $coupon->start_at;
        $this->ends_at = $coupon->ends_at;
        $this->is_active = $coupon->is_active;
    }

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
        $validatedData = $this->validate();

        $validatedData['start_at'] = (!empty($validatedData['start_at'])) ? $validatedData['start_at'] : null;
        $validatedData['ends_at'] = (!empty($validatedData['ends_at'])) ? $validatedData['ends_at'] : null;

        Coupon::updateCouponById($this->coupon_id, $validatedData);

        return $this->alert('success', 'Saved!');
    }
}
