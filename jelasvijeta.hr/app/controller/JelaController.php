<?php

class JelaController extends Controller
{
    private $path = 'private' . DIRECTORY_SEPARATOR . 'jelasvijeta' . DIRECTORY_SEPARATOR;

    public function index()
    {
        echo 'Pozz iz controllera';
        
        $this->view->render($this->path . 'index', [
            'jelo' => 'Fish',
            'jela' => [
                'Riba', 'Juha', 'Meso'
            ]
        ]);
    }
}