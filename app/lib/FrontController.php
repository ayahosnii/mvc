<?php
namespace mvc\app\lib;

class FrontController
{
    const NOT_FOUND_ACTION = 'NotFoundAction';
    const NOT_FOUND_CONTROLLER = 'mvc\app\controllers\NotFoundController';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();

    public function __construct()
    {
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

        if (isset($url[0]) && $url[0] != ''){
            $this->_controller = $url[0];
        }

        if (isset($url[1]) && $url[1] != ''){
            $this->_action = $url[1];
        }

        if (isset($url[2]) && $url[2] != '') {
            $this->_params = $url[2];
        }

    }

    public function dispatch()
    {
        $controllerClassName = 'mvc\app\controllers\\'.ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';
        if(!class_exists($controllerClassName)){
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if (!method_exists($controller, $actionName)){
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }

        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$actionName();
    }
}
