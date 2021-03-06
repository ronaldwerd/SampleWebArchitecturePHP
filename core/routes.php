<?php

class Route {

    var $controllerSlug;
    var $controllerMethod;
    var $controllerClassName;

    public function __construct($route)
    {
        $this->controllerSlug = 'index';
        $this->controllerMethod = 'index';

        $this->controllerSlug = strtolower($route[0]);
        $this->controllerClassName = strtolower($route[0]);

        if(isset($route[0])) {

            /*
             * Clean route path methods
             */

            foreach($route as $k => $v) {
                $route[$k] = str_replace('-','_',strtolower($route[$k]));
            }

            if(isset($route[1])) {
                $this->controllerMethod = $route[1];
            }
        }
    }

    public function getControllerFile()
    {
        return APP_ROOT . "/controllers/" . $this->controllerSlug . ".php";
    }

    public function getControllerMethod()
    {
        return $this->controllerMethod;
    }

    public function getControllerClassName()
    {
        return $this->controllerClassName;
    }
}