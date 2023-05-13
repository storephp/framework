<?php

namespace Store\Dashboard\Http\Livewire\Admin\Permissions\Admins;

use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\FormBuilder;
use Store\Dashboard\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Team\Models\Rule;

class AdminUpdate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    public $admin = null;

    protected $layout = 'admin';

    public function mount(Admin $admin)
    {
        $this->admin = $admin;

        $this->rule_id = $this->admin->membership->rule->id;
        $this->name = $this->admin->name;
        $this->email = $this->admin->email;
    }

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
            'rules' => 'nullable',
            'order' => 40,
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->admin->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if ($validatedData['password']) {
            $this->admin->password = Hash::make($validatedData['password']);
        }

        $this->admin->membership()->update([
            'rule_id' => $validatedData['rule_id'],
        ]);

        return $this->alert('success', 'Saved!');
    }

    protected function pageTitle()
    {
        return 'Create new admin';
    }
}
