<?php

class Autoloader
{
    static function register()
    {
        spl_autoload_register([__CLASS__], 'autoload');
    }

    static function autoload($classname)
    {
        require "../src/".$classname.".php";
    }
}