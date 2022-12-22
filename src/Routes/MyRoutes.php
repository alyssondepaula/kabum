<?php

use Src\Share\Session;

abstract class MyRoutes
{
    protected function home()
    {
        include PAGES.'/Home/index.php';
        exit;
    }

    protected function signin()
    {
        include PAGES.'/SignIn/index.php';
        exit;
    }

    protected function signup()
    {
        include PAGES.'/SignUp/index.php';
        exit;
    }

    protected function app()
    {
        include PAGES.'/App/index.php';
        exit;
    }

    protected function createuser()
    {
        include PAGES.'/CreateClient/index.php';
        exit;
    }

    protected function editclient()
    {
        include PAGES.'/EditClient/index.php';
        exit;
    }
    
    protected function __call($name, $arguments)
    {
        $isAuth = Session::isAuth();
        if($isAuth){
            header('location: /app');
        }else{
            header('location: /');
        }
    }
}