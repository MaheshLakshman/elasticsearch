<?php

namespace App;

class Application
{
    public static string $root_path;

    public Router $router;

    public Request $request;

    public Response $response;

    public static Application $app;

    public function __construct($root_path)
    {
        self::$root_path = $root_path;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}