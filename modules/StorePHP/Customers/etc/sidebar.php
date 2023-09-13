<?php

use StorePHP\Bundler\Contracts\Sidebar\HasMenu;
use StorePHP\Bundler\Contracts\Sidebar\HasLinks;
use StorePHP\Bundler\Lib\Sidebar\Links;
use StorePHP\Bundler\Lib\Sidebar\Menu;

return new class implements HasMenu, HasLinks
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
