<?php

class JelaController extends Controller
{
    private $path = 'private' . DIRECTORY_SEPARATOR . 'jelasvijeta' . DIRECTORY_SEPARATOR;
    private $kategorija='';

    public function index()
    {        
        $jela = Jela::read();

        $this->view->render($this->path . 'index',[
            'jela' => $jela
        ]);
    }

    // private function pripremiJelo()
    // {
    //     $this->kategorije=new stdClass();
    //     $this->kategorije->kategorija='';
    // }

    public function kategorije()
    {
        $kategorije = Kategorije::read();
        $this->view->render($this->path . 'kategorije',[
            'kategorije' => $kategorije
        ]);
    }
}