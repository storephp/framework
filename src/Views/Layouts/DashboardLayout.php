<?php

namespace Store\Dashboard\Views\Layouts;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;
use Store\Dashboard\Builder\Modules\GenerateSidebar;

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
        $permissions = Auth::guard('store')->user()->membership->rule->permissions;

        GenerateSidebar::appendSidebar(config('store.dashboard.core.modules'));

        if (class_exists(\StorePHP\StoreWays\Gather::class)) {
            GenerateSidebar::appendSidebar(\StorePHP\StoreWays\Gather::getSidebar());
        }

        $modules = collect(GenerateSidebar::getSidebar())->sortBy('order')->all();

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
        // $modules = config('store.dashboard.core.modules');

        // dd($modules);

        return view('store::layouts.dashboard');
    }
}
