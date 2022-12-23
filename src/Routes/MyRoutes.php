<?php

use Src\Share\Session;

abstract class MyRoutes
{

    private function authGuard()
    {
        $isAuth = Session::isAuth();
        if(!$isAuth){
            header('location: /');
            exit;
        }

        return;
    }

    private function isLoggedGuard()
    {
        $isAuth = Session::isAuth();
        if($isAuth){
            header('location: /app');
            exit;
        }

        return;
    }
    protected function home()
    {
        $this->isLoggedGuard();
        include PAGES.'/Home/index.php';
        exit;
    }

    protected function signin()
    {
        $this->isLoggedGuard();
        include PAGES.'/SignIn/index.php';
        exit;
    }

    protected function signup()
    {
        $this->isLoggedGuard();
        include PAGES.'/SignUp/index.php';
        exit;
    }

    protected function app()
    {
        $this->authGuard();
        include PAGES.'/App/index.php';
        exit;
    }

    protected function createuser()
    {
        $this->authGuard();
        include PAGES.'/CreateClient/index.php';
        exit;
    }

    protected function editclient()
    {
        $this->authGuard();
        include PAGES.'/EditClient/index.php';
        exit;
    }

    protected function addresses()
    {
        $this->authGuard();
        include PAGES.'/Addresses/index.php';
        exit;
    }

    protected function createaddress()
    {
        $this->authGuard();
        include PAGES.'/CreateAddress/index.php';
        exit;
    }

    protected function editaddress()
    {
        $this->authGuard();
        include PAGES.'/EditAddress/index.php';
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