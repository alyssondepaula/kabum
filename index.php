<?php 

  require_once 'bootstrap.php'; 
  
  require_once DIR . '/src/Routes/Router.php';

  $requestUri = $_SERVER['REQUEST_URI'];

  $router = new Router;
  $router->request($requestUri);

?>
