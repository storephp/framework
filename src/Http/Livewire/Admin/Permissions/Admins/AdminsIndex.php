<?php

namespace StorePHP\Dashboard\Http\Livewire\Admin\Permissions\Admins;

use StorePHP\Dashboard\Models\Admin;
use StorePHP\Dashboard\Views\Layouts\AdminLayout;
use Livewire\Component;

class AdminsIndex extends Component
{
    public function render()
    {
        $admins = Admin::paginate(20);

        return view('store::admin.permissions.admins.index', [
            'admins' => $admins,
        ])->layout(AdminLayout::class);
    }
}
