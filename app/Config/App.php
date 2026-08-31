<?php

declare(strict_types=1);

namespace App\Config;

class App
{
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    ini_set('log_errors', '1');
    error_reporting(E_ALL);

    public function __construct(){
        echo 'App class';
    }
}
