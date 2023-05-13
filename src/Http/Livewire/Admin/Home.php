<?php

namespace Store\Dashboard\Http\Livewire\Admin;

use Store\Dashboard\Views\Layouts\AdminLayout;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('store::admin.home')->layout(AdminLayout::class);
    }
}
