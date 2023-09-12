<?php

namespace StorePHP\Dashboard\Http\Livewire\Admin;

use StorePHP\Dashboard\Views\Layouts\AdminLayout;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('store::admin.home')->layout(AdminLayout::class);
    }
}
