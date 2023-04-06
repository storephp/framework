<?php

namespace Basketin\Dashboard\Http\Livewire;

use Livewire\Component;
use Basketin\Dashboard\Views\Layouts\DashboardLayout;

class Home extends Component
{
    public function render()
    {
        return view('basketin::home')->layout(DashboardLayout::class);
    }
}
