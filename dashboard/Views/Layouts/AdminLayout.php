<?php

namespace StorePHP\Dashboard\Views\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;
use StorePHP\Bundler\Facades\Bundles;

class AdminLayout extends Component
{
    public $sidebar;

    public function __construct()
    {
        $this->sidebar = Bundles::getAdminSidebar();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // $modules = config('store.dashboard.core.modules');

        // dd($this->sidebar);

        return view('store::layouts.admin');
    }
}
