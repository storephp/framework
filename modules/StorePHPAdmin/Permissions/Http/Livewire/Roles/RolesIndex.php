<?php

namespace Store\Modules\StorePHPAdmin\Permissions\Http\Livewire\Roles;

use StorePHP\Bundler\Abstracts\GridAbstract;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;

class RolesIndex extends GridAbstract
{
    public $gridId = 'storephpadmin_permissions_roles_index';

    protected $pretitle = 'Permissions';
    protected $title = 'Roles listing';

    public function layout()
    {
        return AdminLayout::class;
    }
}
