<?php

namespace Basketin\Dashboard\Views\Layouts;

use Illuminate\Support\Facades\Auth;
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
        $permissions = Auth::guard('basketin')->user()->membership->rule->permissions;
        $modules = collect(config('basketin.dashboard.core.modules'))->sortBy('order')->all();
        $this->modules = array_filter($modules, function ($module) use ($permissions) {
            if (!in_array('*', $permissions)) {
                if (in_array($module['rule'], $permissions)) {
                    return $module;
                }
            } else {
                return $module;
            }
        });
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // $modules = config('basketin.dashboard.core.modules');

        // dd($modules);

        return view('basketin::layouts.dashboard');
    }
}
