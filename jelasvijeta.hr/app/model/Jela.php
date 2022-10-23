<?php

class Jela
{
    public static function readOne($id)
    {
        $veza = DB::getInstance();
        $izraz = $veza->prepare('
        
            select * from kategorije where id=:id
        
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
        
            select * from kategorije order by kategorija
        
        ');
        $izraz->execute(); 
        return $izraz->fetchAll();
    }
}