<?php

namespace StorePHPAdmin\Permissions\Http\Livewire\Admins;

use Illuminate\Support\Facades\Hash;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Models\Admin;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;

class AdminUpdate extends FromAbstract
{
    public $formId = 'storephpadmin_permissions_admin_form_update';

    protected $pretitle = 'Admin';
    protected $title = 'Create new admin';

    public function mount(Admin $admin)
    {
        $this->admin = $admin;

        foreach ($this->models(['rule_id', 'password']) as $model) {
            $this->{$model} = $this->admin[$model];
        }

        $this->rule_id = $admin->membership->rule_id;
    }

    public function layout()
    {
        return AdminLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        foreach ($this->models(['rule_id', 'password']) as $model) {
            $this->admin->{$model} = $validateData[$model];
        }

        if ($newPassword = $validateData['password']) {
            $this->admin->password = Hash::make($newPassword);
        }

        $this->admin->save();

        $this->admin->membership->rule_id = $this->rule_id;
        $this->admin->membership->save();

        return $this->pushAlert('success', 'Updated!');
    }
}
