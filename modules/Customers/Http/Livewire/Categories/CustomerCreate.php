<?php

namespace Store\Modules\Customers\Http\Livewire\Categories;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\FormBuilder;
use Store\Modules\Customers\Models\Customer;

class CustomerCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Customer';
    protected $pageTitle = 'Create new customer';

    public function generateFields($form)
    {
        $form->addField('text', [
            'label' => 'First name',
            'model' => 'first_name',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Last name',
            'model' => 'last_name',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'required',
            'order' => 30,
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $customer = Customer::create($validatedData);

        return $this->alert('success', 'Saved!');
    }

    protected function pageTitle()
    {
        return __('storeCustomers::main.create.title');
    }
}
