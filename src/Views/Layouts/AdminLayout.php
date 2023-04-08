<?php

namespace Basketin\Dashboard\Views\Layouts;

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
        // $modules = config('basketin.dashboard.core.modules');

        // dd($modules);

        return view('basketin::layouts.admin');
    }
}
