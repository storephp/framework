<?php

use StorePHP\Bundler\Contracts\Sidebar\HasLinks;
use StorePHP\Bundler\Contracts\Sidebar\HasMenu;
use StorePHP\Bundler\Lib\Sidebar\Links;
use StorePHP\Bundler\Lib\Sidebar\Menu;

return new class implements HasMenu, HasLinks
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'clipboard-list',
            label: 'Catalog',
            order: 20,
        );
    }

    public function links(Links $links)
    {
        $links->link(
            icon: 'category',
            label: 'Categories',
            href: 'store.dashboard.catalog.categories.index',
        );
        $links->link(
            icon: 'packages',
            label: 'Products',
            href: 'store.dashboard.catalog.products.index',
        );
    }
};
