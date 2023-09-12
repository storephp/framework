<?php

namespace StorePHP;

class Routes
{
    public static function dashboard($prefix = null)
    {
        require __DIR__ . '/../routes/dashboard.php';
    }
}
