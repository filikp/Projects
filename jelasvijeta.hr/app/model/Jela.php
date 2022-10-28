<?php

class Jela
{
    public static function readOne($id)
    {
        $veza = DB::getInstance();
        $izraz = $veza->prepare('
        
            select * from jela where id=:id
        
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
        
        select a.id, a.naziv, b.kategorija, c.tag, e.sastojak, count(e.sastojak) as sastojciujelima 
        from jela a inner join kategorije b 
        on a.kategorije = b.id 
        inner join tags c 
        on a.tags = c.id 
        inner join sastojciujelima d 
        on a.id = d.jela 
        inner join sastojci e 
        on d.sastojci = e.id 
        inner join jezici f 
        on d.jezici = f.id
        group by a.id, a.naziv, b.kategorija, c.tag;
        
        ');
        $izraz->execute(); 
        return $izraz->fetchAll();
    }

    public static function create($p)
    {

        $veza = DB::getInstance();
        $izraz = $veza->prepare('
            insert into jela
            (naziv, kategorije, tags)
            values
            (:naziv, :kategorije, :tags);
        ');

        $izraz->execute($p);
        return $veza->lastInsertId();
    }
}