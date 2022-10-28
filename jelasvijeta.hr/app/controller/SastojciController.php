<?php

class SastojciController extends Controller
{
    private $phtmlDir = 'private' . 
        DIRECTORY_SEPARATOR . 'sastojci' .
        DIRECTORY_SEPARATOR;

    public function index()
    {

        $sastojci = Sastojci::read();
        $this->view->render($this->phtmlDir . 'index',[
            'sastojci' => $sastojci
        ]);
    }
}