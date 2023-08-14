<?php

namespace StorePHP\Dashboard\Http\Livewire;

use Livewire\Component;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class Home extends Component
{
    public function render()
    {
        return view('store::home')->layout(DashboardLayout::class);
    }
}
