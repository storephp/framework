<?php

use StorePHP\Bundler\Lib\Sidebar\Menu;
use StorePHP\Bundler\Lib\Sidebar\Links;

return new class
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'user-shield',
            label: 'Permissions',
            order: 10,
        );
    }

    public function links(Links $links)
    {
        $links->link(
            icon: 'user',
            label: 'Admins',
            href: 'store.dashboard.permissions.admins.index',
        );
        $links->link(
            icon: 'user-check',
            label: 'Roles',
            href: 'store.dashboard.permissions.admins.index',
        );
    }
};
