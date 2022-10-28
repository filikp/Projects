<?php

class Sastojci
{
    public static function readOne($id)
    {
        $veza = DB::getInstance();
        $izraz = $veza->prepare('
        
            select * from sastojci where id=:id
        
        ');
        $izraz->execute([
            'id'=>$id
        ]);
        return $izraz->fetch(); 
    }

    // CRUD - R
    public static function read()
    {
        $veza = DB::getInstance();
        $izraz = $veza->prepare('
        
        select * from sastojci
        order by 2;
        
        ');
        $izraz->execute(); 
        return $izraz->fetchAll();
    }
}