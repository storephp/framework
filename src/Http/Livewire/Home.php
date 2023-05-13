<?php

namespace Store\Dashboard\Http\Livewire;

use Livewire\Component;
use Store\Dashboard\Views\Layouts\DashboardLayout;

class Home extends Component
{
    public function render()
    {
        return view('store::home')->layout(DashboardLayout::class);
    }
}
