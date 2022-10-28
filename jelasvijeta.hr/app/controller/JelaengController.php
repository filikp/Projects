<?php

class JelaengController extends Controller
{
    private $path = 'private' . DIRECTORY_SEPARATOR . 'jelaeng' . DIRECTORY_SEPARATOR;
    private $kategorija='';

    public function index()
    {        
        $kategorija = Jela::read();

        $this->view->render($this->path . 'index',[
            'kategorije' => $kategorija
        ]);
    }

    // private function pripremiJelo()
    // {
    //     $this->kategorije=new stdClass();
    //     $this->kategorije->kategorija='';
    // }
}