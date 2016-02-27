<?php


/**
 * Router
 * For navigate on backend side
 *
 * @author Oleksandr
 */
class Router {
    
    private $routes;
    
    /**
     * gets routs aray
     */
    public function __construct(){
        $this->routes = include(ROOT.'/config/routes.php');
    }
    
    /**
     * Returns request string
     * @return string
     */
    private function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return '';
    }
    
    /**
     * Parse request string on controller name, action name and parameters
     * Create controller object and runs its action with parameters
     */
    public function run() {
        $uri = $this->getURI();
        foreach ($this->routes as $pattern => $request){
            if(preg_match("~$pattern~", $uri)){
                
                $uri = preg_replace("~$pattern~", $request, $uri);
                $parts = explode('/', $uri);
               
                $controller_name = ucfirst(array_shift($parts)).'Controller';
                $action_name = 'action'.ucfirst(array_shift($parts));
                
                $controller_path = ROOT.'/controllers/'.$controller_name.'.php';
                
                if(file_exists($controller_path)){
                    include_once ($controller_path);
                    $obj = new $controller_name;
                    $result = call_user_func_array(array($obj, $action_name), $parts);
                    if(!$result){
                        exit();
                    }
                }else{
                    exit();
                }
                exit();
            }
        }
    }
    
}