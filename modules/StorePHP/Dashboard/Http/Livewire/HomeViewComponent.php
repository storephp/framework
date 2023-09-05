<?php

namespace Store\Modules\StorePHP\Dashboard\Http\Livewire;

use Livewire\Component;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class HomeViewComponent extends Component
{
    public function render()
    {
        return view('storephp-dashboard::home')
            ->layout(DashboardLayout::class);
    }
}
