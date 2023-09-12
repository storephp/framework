<?php

namespace StorePHP\Dashboard\Views\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;
use StorePHP\Bundler\Facades\Bundles;

class DashboardLayout extends Component
{
    public $sidebar;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct()
    {
        $this->sidebar = Bundles::getSidebar();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('store::layouts.dashboard');
    }
}
