<?php

use StorePHP\Bundler\Lib\Sidebar\Menu;

return new class
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'dashboard',
            label: 'Dashboard',
            href: 'store.dashboard.home',
            order: 10,
        );
    }
};
