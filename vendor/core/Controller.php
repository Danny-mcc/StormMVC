<?php

class Controller
{
    public function __construct()
    {
        $this->view = new View;
    }

    public function render($name, $data = null, $template = 'template')
    {
        $this->view->render($name, $data, $template);
        exit;
    }
}