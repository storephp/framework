<?php

use StorePHP\Bundler\Lib\Sidebar\Menu;
use StorePHP\Bundler\Lib\Sidebar\Links;

return new class
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'currency-pound',
            label: 'Sales',
            order: 40,
        );
    }

    public function links(Links $links)
    {
        $links->link(
            icon: 'truck',
            label: 'Orders',
            href: 'store.dashboard.sales.orders.index',
        );
    }
};
