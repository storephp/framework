<?php

namespace StorePHPAdmin\Permissions\Http\Livewire\Admins;

use StorePHP\Bundler\Abstracts\GridAbstract;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;

class AdminsIndex extends GridAbstract
{
    public $gridId = 'storephpadmin_permissions_admins_index';

    protected $pretitle = 'Permissions';
    protected $title = 'Admins listing';

    public function layout()
    {
        return AdminLayout::class;
    }
}
