<?php

namespace Store\Dashboard\Builder\Traits;

use Store\Dashboard\Builder\Form\Tabs;

trait AppendTabs
{
    public static $tabs = [];

    /**
     * Get the value of tabs
     */
    public static function getTabs()
    {
        return static::$tabs;
    }

    /**
     * Set the value of tabs
     *
     */
    public static function setTabs($callback)
    {
        $tabs = new Tabs;

        $callback($tabs);

        static::$tabs = array_merge(static::$tabs, $tabs->getTabs());
    }
}
