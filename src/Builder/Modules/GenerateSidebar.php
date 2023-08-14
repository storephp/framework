<?php

namespace StorePHP\Dashboard\Builder\Modules;

class GenerateSidebar
{
    private static $sidebar = [];

    public static function appendSidebar($sidebar)
    {
        static::$sidebar = array_merge(static::$sidebar, $sidebar);
    }

    public static function getSidebar()
    {
        return static::$sidebar;
    }
}
