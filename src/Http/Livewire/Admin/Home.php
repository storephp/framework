<?php

namespace Basketin\Dashboard\Http\Livewire\Admin;

use Basketin\Dashboard\Views\Layouts\AdminLayout;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('basketin::admin.home')->layout(AdminLayout::class);
    }
}
