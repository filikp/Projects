<?php

class JelaController extends Controller
{
    private $path = 'private' . DIRECTORY_SEPARATOR . 'jelasvijeta' . DIRECTORY_SEPARATOR;

    public function index()
    {        
        $this->view->render($this->path . 'index', [
            'jelo' => 'Fish',
            'jela' => [
                'Riba', 'Juha', 'Meso'
            ]
        ]);
    }
}