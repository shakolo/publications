<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Router {
    private $routes;
    
    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    /**
     * Returns request string 
     * @return string
     */
    public function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){
//        print_r($this->routes);
//        echo 'Class Router->run()';
        $uri = $this->getUri();
//        echo $uri;
        foreach($this->routes as $uriPattern => $path) {
//            echo "<br>$uriPattern -> $path";
            if (preg_match("~$uriPattern~", $uri)) {
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
//                echo '+';
//                echo $path;
                $segments = explode('/', $internalRoute);
//                print_r($segments);
//                $test2 = array_shift($segments).'Test2';
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
//                echo $controllerName;
                
                $actionName = 'action'.ucfirst(array_shift($segments));
//                echo $actionName;
                
                $parametrs = $segments;
//                print_r($parametrs);
                
                $conrollerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                if(file_exists($conrollerFile)){
                    include_once($conrollerFile);
                }
                
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName), $parametrs);
                
                if($result != null) {
                    break;
                }
            }
        }

    }
}