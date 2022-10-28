<?php

class TagsController extends Controller
{
    private $phtmlDir = 'private' . 
        DIRECTORY_SEPARATOR . 'tags' .
        DIRECTORY_SEPARATOR;

    public function index()
    {

        $tags = Tags::read();
        $this->view->render($this->phtmlDir . 'index',[
            'tags' => $tags
        ]);
    }
}