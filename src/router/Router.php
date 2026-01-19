<?php
namespace App\Router;

class Router
{
    private $routes = [
        '/' => "BlogController@index",
        '/blog/{id}' => "BlogController@show",
        '/login' => "AuthorController@login",
        '/register' => "AuthorController@register",
        '/blognew' => "BlogController@blogNew"
    ];

    public function dispatch($request_uri)
    {
        $controller = null;
        $action = null;
        $params = [];

        foreach ($this->routes as $route => $handler) {
            $pattern = preg_replace('/\{(\w+)\}/', '([\w\-]+)', $route);
            $pattern = "#^" . $pattern . "$#";
            if (preg_match($pattern, $request_uri, $matches)) {
                list($controller, $action) = explode('@', $handler);
                array_shift($matches);
                $params = $matches;
                break;
            }
        }

        if (!$controller) {
            http_response_code(404);
            include __DIR__ . '/../../views/errors/page404.php';
            exit;
        }

        $controllerClass = "App\\Controllers\\$controller";

        if (!class_exists($controllerClass)) {
            http_response_code(500);
            include __DIR__ . '/../../views/errors/page500.php';
            exit;
        }

        $controllerInstance = new $controllerClass();
        $controllerInstance->$action(...$params);
    }
}
