<?php


class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {

        $url = $this->parseUrl();

        $controllerName = ucfirst($url[0]).'Controller.php';

        if (file_exists(CONTROLLER_PATH . $controllerName)) {
            $this->controller = ucfirst(array_shift($url)).'Controller';
        }

        $filePath = CONTROLLER_PATH . $this->controller . '.php';

        if(file_exists($filePath)){
            require_once(CONTROLLER_PATH . $this->controller . '.php');
        }

        $this->controller = new $this->controller;

        if ( isset($url[0]) ) {
            if (method_exists($this->controller, $url[0])) {
                $this->method = array_shift($url);
            }
        }

        $this->params = array_values((array)$url);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        $url = (isset($_GET['url']) ? $_GET['url'] : '');
        $url = explode('/', trim($url, '/'));
        return $url;
    }
}