<?php

namespace OutMart\Dashboard\Http\Livewire;

use Livewire\Component;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;

class Home extends Component
{
    public function render()
    {
        return view('outmart::home')->layout(DashboardLayout::class);
    }
}
