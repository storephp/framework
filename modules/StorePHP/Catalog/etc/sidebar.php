<?php

use StorePHP\Bundler\Lib\Sidebar\Menu;
use StorePHP\Bundler\Lib\Sidebar\Links;
// use StorePHP\Bundler\Lib\Sidebar\SubLinks;

return new class
{
    public function menu(Menu $menu)
    {
        $menu->info('clipboard-list', 'Catalog');
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
