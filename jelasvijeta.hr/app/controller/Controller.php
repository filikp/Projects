<?php

class Controller
{
    protected $view;

    public function __contruct()
    {
        $this->view = new View();
    }
}