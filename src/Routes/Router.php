<?php

require_once __DIR__ . '/MyRoutes.php';

class Router extends MyRoutes
{
    public function request(string $requestUri)
    {
        $route = substr($requestUri, 1);

        if ($route === '') {
            $this->home();
        } else {
            $this->$route();
        }
    }
}

?>