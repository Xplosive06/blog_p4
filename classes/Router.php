<?php
include CONTROLLER.'Home.php';
/**
 * Class Routeur
 *
 * create routes and find controller
 */
class Router
{
    private $request;

    private $routes = [
                            "home.html"                 => ["controller" => 'Home', "method" => 'showHome'],
                            "connection.html"           => ["controller" => 'Home', "method" => 'showConnectionCheck'],
                            "check_connection.html"     => ["controller" => 'Home', "method" => 'checkConnection'],
                            "new_connection.html"       => ["controller" => 'Home', "method" => 'showConnectionNew'],
                            "connection_new.html"       => ["controller" => 'Home', "method" => 'newConnection'],
                            "admin.html"                => ["controller" => 'Home', "method" => 'showAdmin'],
                            "comments.html"             => ["controller" => 'Home', "method" => 'showComments'],

    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams()
    {

        $params = array();

        // extract GET params
        $elements = explode('/', $this->request);
        unset($elements[0]);

        for($i = 1; $i<count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];  //delete/id/4 => id/4
            $i++;
        }

        // extract POST params
        if($_POST)
        {
            foreach($_POST as $key => $val)
            {
                $params[$key] = $val;
            }
        }

        return $params;

    }

    public function renderController()
    {
        
        $route  = $this->getRoute();
        $params = $this->getParams();
        
        if(key_exists($route, $this->routes))
        {

            // authorisation
            $controller = $this->routes[$route]['controller'];
            $method     = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);

        } else {
            echo '404';
        }

    }
}