<?php

namespace Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles;

use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;
use OutMart\Team\Models\Rule;

class RoleCreate extends FromAbstract
{
    public $formId = 'storephpadmin_permissions_role_form';

    protected $pretitle = 'Permissions';
    protected $title = 'Create new role';

    public function layout()
    {
        return AdminLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        if (is_null($validateData['permissions']) && is_null($validateData['all_permissions'])) {
            return $this->addError('permissions', 'error');
        }

        if (!is_null($validateData['all_permissions'])) {
            $validateData['permissions'] = ["*"];
        }

        Rule::create($validateData);

        return $this->pushAlert('success', 'Saved!');
    }
}
