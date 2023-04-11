<?php

namespace Basketin\Dashboard\Http\Livewire\Admin\Permissions\Admins;

use Basketin\Dashboard\Models\Admin;
use Basketin\Dashboard\Views\Layouts\AdminLayout;
use Livewire\Component;

class AdminsIndex extends Component
{
    public function render()
    {
        $admins = Admin::paginate(20);

        return view('basketin::admin.permissions.admins.index', [
            'admins' => $admins,
        ])->layout(AdminLayout::class);
    }
}
