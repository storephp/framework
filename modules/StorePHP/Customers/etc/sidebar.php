<?php

use StorePHP\Bundler\Lib\Sidebar\Menu;
use StorePHP\Bundler\Lib\Sidebar\Links;
// use StorePHP\Bundler\Lib\Sidebar\SubLinks;

return new class
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'users',
            label: 'Customers',
            order: 30,
        );
    }

    public function links(Links $links)
    {
        $links->link(
            icon: 'list',
            label: 'Customers list',
            href: 'store.dashboard.customers.index',
        );
    }
};