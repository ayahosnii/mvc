<?php

namespace mvc\app\controllers;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;

    public function notFoundAction()
    {
        echo 'Sorry This Page Doesn\'t Exist';
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
}