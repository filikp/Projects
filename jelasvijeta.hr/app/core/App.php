<?php

class App
{
    public static function start()
    {
        $route = Request::getRoute();  // dohvaća rutu

        $parts_of_route = explode('/', $route); // razdvaja rutu u indeksni niz po /

        //Log::log($parts_of_route);

        $class = '';
        // Ukoliko drugi dio rute (klasa) nije postavljen, postavi ju na IndexController
        if(!isset($parts_of_route[1]) || $parts_of_route[1]===''){
            $class = 'IndexController';
        }else{  // ukoliko je postavljen, počni velikim slovom i dovrši ga sa Controller. Npr index -> IndexController
            $class = ucfirst($parts_of_route[1]) . 'Controller';
        }
        //Log::log($class);

        $method = '';
        // Ukoliko treći dio rute (metoda) nije postavljen, postavi ju na index
        if(!isset($parts_of_route[2]) || $parts_of_route[2]===''){
            $method = 'index';
        }else{ // ukoliko je, spremi ju kakva je
            $method = $parts_of_route[2];
        }
        //Log::log($method);

        $parameter = '';
        if(!isset($parts_of_route[3]) || $parts_of_route[3]===''){
            $parameter = '';
        }else{
            $parameter = $parts_of_route[3];
        }

        // ukoliko klasa i metoda u toj klasi postoje, instancijraj ju i pozovi tu metodu u toj klasi 
        if(class_exists($class) && method_exists($class, $method)){
            $instance = new $class();
            if(strlen($parameter)>0){
                $instance->$method($parameter);
            }else{
                $instance->$method();
            }
        }else{
            $view = new View();
            $view->render('errorClassOrMethod', [
                'class' => $class,
                'method' => $method
            ]);
        }
    }

    public static function config($key)
    {
        $configFile = BP_APP . 'configuration.php';
        if(!file_exists($configFile)){
            return 'Datoteka' . $configFile . 'Ne postoji.';
        }
        $config = require $configFile;
        if(isset($config[$key])){
            return $config[$key];
        }
        return 'Ključ'. $key . ' ne postoji u datoteci ' . $configFile;
    }

}