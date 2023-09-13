<?php

use StorePHP\Bundler\Contracts\Sidebar\HasMenu;
use StorePHP\Bundler\Contracts\Sidebar\HasLinks;
use StorePHP\Bundler\Lib\Sidebar\Menu;
use StorePHP\Bundler\Lib\Sidebar\Links;

return new class implements HasMenu, HasLinks
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'speakerphone',
            label: 'Marketing',
            order: 40,
        );
    }

    public function links(Links $links)
    {
        $links->link(
            icon: 'ticket',
            label: 'Coupons',
            href: 'store.dashboard.marketing.coupons.index',
        );
    }
};
