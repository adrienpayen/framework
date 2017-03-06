<?php session_start();

use \Framework\Framework\Routing\Router;

require "conf.inc.php";

spl_autoload_register(function ($class){
    if (file_exists("core/".$class.".php")) {
        include "core/".$class.".php";
    } elseif (file_exists("models/".$class.".php")) {
        include "models/".$class.".php";
    }
});

new Router();