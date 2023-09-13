<?php

use StorePHP\Bundler\Contracts\Sidebar\HasMenu;
use StorePHP\Bundler\Lib\Sidebar\Menu;

return new class implements HasMenu
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
