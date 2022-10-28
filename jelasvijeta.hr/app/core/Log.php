<?php

class Log
{
    public static function log($elem)
    {
        echo '<pre>';
        print_r($elem);
        echo '</pre>';
    }
}