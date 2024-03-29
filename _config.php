<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

class MyAutoload
{
    public static function start()
    {
        
        spl_autoload_register(array(__CLASS__, 'autoload'));
        // define the HOST et ROOT routes
        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/php/blog_p4/');
        define('ROOT', $root.'/php/blog_p4/');

        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('MODEL', ROOT.'model/');
        define('CLASSES', ROOT.'classes/');

        define('CSS', HOST.'public/css/');
        define('JS', HOST.'public/js/');
        define('IMG', HOST.'public/img/');
    }
    // try to find and load when you use a controller, a classe or a model
    public static function autoload($class)
    {
        if(file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');
        } else if (file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');
        } else if (file_exists(MODEL.$class.'.php'))
        {
            include_once (MODEL.$class.'.php');
        } ;

    }
}