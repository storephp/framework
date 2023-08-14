<?php

namespace StorePHP\Dashboard\Http\Livewire\Admin\Permissions\Admins;

use StorePHP\Dashboard\Builder\Contracts\hasGenerateFields;
use StorePHP\Dashboard\Builder\FormBuilder;
use StorePHP\Dashboard\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Team\Models\Rule;

class AdminCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    protected $layout = 'admin';

    public function generateFields($form)
    {
        $form->addField('select', [
            'label' => 'Select Rule',
            'model' => 'rule_id',
            'options' => Rule::get()->map(function ($rule) {
                return [
                    'label' => $rule->rule_code,
                    'value' => $rule->id,
                ];
            }),
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('text', [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'required',
            'order' => 30,
        ]);

        $form->addField('text', [
            'label' => 'Password',
            'model' => 'password',
            'rules' => 'required',
            'order' => 40,
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $admin = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $admin->membership()->create([
            'rule_id' => $validatedData['rule_id'],
        ]);

        return $this->alert('success', 'Saved!');
    }

    protected function pageTitle()
    {
        return 'Create new admin';
    }
}
