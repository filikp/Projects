<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//session_start();

define('BP', __DIR__ . DIRECTORY_SEPARATOR);
define('BP_APP', BP . 'app' . DIRECTORY_SEPARATOR);

$Autoload = [
    BP_APP . 'core',
    BP_APP . 'controller',
    BP_APP . 'model'
];

$paths = implode(PATH_SEPARATOR, $Autoload);

set_include_path($paths);

spl_autoload_register(function($class){
    $paths = explode(PATH_SEPARATOR, get_include_path());
        foreach($paths as $p){
            $file = $p . DIRECTORY_SEPARATOR . $class . '.php';
            if(file_exists($file)){
                require_once $file;
                break;
            }
        }
});

App::start();