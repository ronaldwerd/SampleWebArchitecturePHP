<?php

class AppMain {

    public static function display404()
    {
        http_response_code(404);
        require APP_ROOT . '/controllers/home.php';
        $controller = new Home();
        $controller->__404();
        $controller->showView();
    }

    public static function run()
    {
        session_start();
        
        DBModel::connect();

        if (count($_GET) > 0) {

            $keys = array_keys($_GET);
            $routeParams = explode("/", trim($keys[0], "/"));

            /*
             * Based on the URL parameters, a controller file and a method to be called is
             * determined by routes.php. Custom route handling should go inside that file.
             */

            $route = new Route($routeParams);

            if (is_file($route->getControllerFile())) {

                require $route->getControllerFile();

                $controllerClass = $route->getControllerClassName();
                $controller = new $controllerClass($routeParams);
                $controller->setParams($routeParams);

                $method = $route->getControllerMethod();

                if (method_exists($controller, $method)) {
                    call_user_func(array($controller, $method));
                    $controller->showView();
                } else {
                    self::display404();
                }

                die;

            } else {

                if (empty($controllerName)) {
                    self::display404();
                }

                die;
            }

        } else {

            /*
             * If there are no route params available, we need to dispatch
             * a default controller and method for the root of the website.
             *
             * If this controller file is not present, we just throw a 404.
             */

            $indexController = APP_ROOT . '/controllers/home.php';

            if(is_file($indexController)) {
                require APP_ROOT . '/controllers/home.php';
                $controller = new Home();
                $controller->index();
                $controller->showView();
            } else {
                self::display404();
            }

            die;
        }
    }
}
