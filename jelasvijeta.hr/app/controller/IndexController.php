<?php

class IndexController extends Controller
{
    public function index()
    {
        //echo 'IndexController->index';
        $this->view->render('index'); // idemo u view index.phtml
    }
}