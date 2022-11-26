<?php

namespace mvc\app\controllers;

use mvc\app\lib\FrontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;

    protected $_data = [];

    public function notFoundAction()
    {
        echo $this->_view();
    }

    public function setController($controllerName)
    {
        $this->_controller = $controllerName;
    }

    public function setAction  ($actionName)
    {
        $this->_action = $actionName;
    }

    public function setParams ($paramsName)
    {
        $this->_params = $paramsName;
    }

    protected function _view()
    {
        if ($this->_action == FrontController::NOT_FOUND_ACTION) {
            require_once VIEW_PATH . 'notfound' . DS . 'notfound.view.php';
        } else {
            $view =  VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if (file_exists($view)) {
                extract($this->_data);
                require_once $view;
            } else {
                require_once VIEW_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
    }
}