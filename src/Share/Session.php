<?php

namespace Src\Share;

use Src\Modules\Users\Entities\User;

class Session
{

    public static function start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function signIn(User $user)
    {
        self::start();
        $_SESSION['user'] = [
            'id'=> $user->id,
            'name'=>$user->name,
            'email'=>$user->email
            
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