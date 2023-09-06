<?php

namespace Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Admins;

use Illuminate\Support\Facades\Hash;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Models\Admin;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;

class AdminCreate extends FromAbstract
{
    public $formId = 'storephpadmin_permissions_admin_form';

    protected $pretitle = 'Admin';
    protected $title = 'Create new admin';

    public function layout()
    {
        return AdminLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $admin = Admin::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
        ]);

        $admin->membership()->create([
            'rule_id' => $validateData['rule_id'],
        ]);

        return $this->pushAlert('success', 'Saved!');
    }
}
