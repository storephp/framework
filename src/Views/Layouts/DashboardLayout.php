<?php

namespace OutMart\Dashboard\Views\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardLayout extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $modules;
 
    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct()
    {
        $this->modules = config('outmart.dashboard.core.modules');
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // $modules = config('outmart.dashboard.core.modules');

        // dd($modules);

        return view('outmart::layouts.dashboard');
    }
}
