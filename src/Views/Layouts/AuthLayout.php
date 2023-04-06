<?php

namespace Basketin\Dashboard\Views\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class AuthLayout extends Component
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

    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('basketin::layouts.auth');
    }
}
