<?php

namespace Src\Share;

class Session
{

    public static function start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function signIn($id)
    {

        self::start();

        $_SESSION['user'] = [
            'id'=> $id,
        ];
        header('location: app.php');
        exit;
    }

    public static function signOut()
    {
        self::start();

        unset($_SESSION['user']);
        header('location: index.php');
        exit;
    }

    public static function isAuth()
    {
        self::start();
        return isset($_SESSION['user']['id']);
    }

    public static function authPage()
    {
        if (self::isAuth()) {
            header('location: index.php');
            exit;
        }
    }
}