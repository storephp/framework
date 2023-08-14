<?php

namespace StorePHP\Dashboard\Views\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // $modules = config('store.dashboard.core.modules');

        // dd($modules);

        return view('store::layouts.admin');
    }
}
