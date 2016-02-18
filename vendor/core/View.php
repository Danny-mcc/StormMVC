<?php


Class View
{

    protected $contentView;
    protected $viewData = [];

    public function render($name, $data = null, $template = 'template')
    {
        if( ! file_exists('../app/views/' . $name . '.php')){
            throw new Exception("View {$name} not found.");
        }
        $this->setData($data);

        //extract($data);

        if ($this->templateExists($template)){
            $this->viewData = $data;
            $this->contentView = '../app/views/' . $name . '.php';
            require('../app/views/' . $template . '/template.php');
        } else {
            require('../app/views/' . $name . '.php');
        }
    }

    public function templateExists($template){
        return file_exists('../app/views/' . $template . '/template.php');
    }

    private function setData($data)
    {
        $this->viewData = $data;
    }

    public function content()
    {
        extract((array)$this->viewData);
        require($this->contentView);
    }



}