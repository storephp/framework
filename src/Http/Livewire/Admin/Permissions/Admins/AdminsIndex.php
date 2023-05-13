<?php

namespace Store\Dashboard\Http\Livewire\Admin\Permissions\Admins;

use Store\Dashboard\Models\Admin;
use Store\Dashboard\Views\Layouts\AdminLayout;
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
