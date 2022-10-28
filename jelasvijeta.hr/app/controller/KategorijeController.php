<?php

class KategorijeController extends Controller
{
    private $phtmlDir = 'private' . 
        DIRECTORY_SEPARATOR . 'kategorije' .
        DIRECTORY_SEPARATOR;

    public function index()
    {

        $kategorije = Kategorije::read();
        $this->view->render($this->phtmlDir . 'index',[
            'kategorije' => $kategorije
        ]);
    }
}