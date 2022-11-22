<?php

namespace mvc\app\controllers;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        echo 'Welcome from MVC Action';
    }
}