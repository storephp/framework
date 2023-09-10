<?php

namespace Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles;

use StorePHP\Bundler\Abstracts\FromAbstract;
use OutMart\Team\Models\Rule;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;

class RoleUpdate extends FromAbstract
{
    public $formId = 'storephpadmin_permissions_role_form';

    protected $pretitle = 'Permissions';
    protected $title = 'Update the role';

    public function mount(Rule $role)
    {
        $this->rule = $role;

        foreach ($this->models(['all_permissions']) as $model) {
            $this->{$model} = $this->rule[$model];
        }

        if ($role->permissions[0] == '*') {
            $this->all_permissions = true;
        }
    }

    public function layout()
    {
        return AdminLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        foreach ($this->models(['all_permissions']) as $model) {
            $this->rule->{$model} = $validateData[$model];
        }

        if ($validateData['all_permissions']) {
            $this->rule->permissions = ["*"];
        }

        $this->rule->save();

        return $this->pushAlert('success', 'Updated!');
    }
}
