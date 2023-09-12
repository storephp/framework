<?php

use StorePHP\Bundler\Lib\Sidebar\Menu;
use StorePHP\Bundler\Lib\Sidebar\Links;

return new class
{
    public function menu(Menu $menu)
    {
        $menu->info(
            icon: 'settings-2',
            label: 'System',
            order: 10000,
        );
    }

    public function links(Links $links)
    {
        $links->link(
            icon: 'adjustments-alt',
            label: 'Configurations',
            href: 'store.dashboard.system.configurations',
        );
    }
};
