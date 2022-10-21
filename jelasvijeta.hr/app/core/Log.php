<?php

// Ispisuje lijepo ono što nas zanima 
class Log
{
    public static function log($what)
    {
        echo '<pre>';
        print_r($what);
        echo '</pre>';
    }
}