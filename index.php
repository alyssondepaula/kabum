<?php 

  require_once 'bootstrap.php'; 
  
  require_once DIR . '/src/Routes/Router.php';

  $requestUri = $_SERVER['REQUEST_URI'];
  $uri = trim(strtok($requestUri, '?'));

  $router = new Router;
  $router->request($uri);

?>
