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
    public static function signIn($user)
    {

        self::start();

        $_SESSION['user'] = [
            'id'=> $user->id,
            'name'=> $user->name,
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

    public static function isLogged()
    {
        self::start();
        return isset($_SESSION['user']['id']);
    }

    public static function authPage()
    {
        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}