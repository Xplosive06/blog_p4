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
        "admin.html"                => ["controller" => 'Home', "method" => 'showAdmin'],
        "connection.html"           => ["controller" => 'ConnectionController', "method" => 'showConnectionCheck'],
        "check_connection.html"     => ["controller" => 'ConnectionController', "method" => 'checkConnection'],
        "new_connection.html"       => ["controller" => 'ConnectionController', "method" => 'showConnectionNew'],
        "add_user.html"             => ["controller" => 'UserController', "method" => 'addUser'],
        "delete_user.html"          => ["controller" => 'UserController', "method" => 'deleteUser'],
        "add_post.html"             => ["controller" => 'PostController', "method" => 'addPost'],
        "delete_post.html"          => ["controller" => 'PostController', "method" => 'deletePost'],
        "post.html"             => ["controller" => 'PostController', "method" => 'showPosts'],
        "add_comment.html"          => ["controller" => 'CommentController', "method" => 'addComment'],
        "delete_comment.html"       => ["controller" => 'CommentController', "method" => 'deleteComment'],
        "report_comment.html"       => ["controller" => 'CommentController', "method" => 'reportComment'],

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