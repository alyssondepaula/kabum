<?php

namespace Src\Modules\Users\Usecases;

use Src\Modules\Users\Repositories\UserRepository;

use Exception;
use Src\Modules\Users\Mappers\Usermap;
use Src\Share\Session;

class LoginUserCase {

    static function execute($email, $password){

        try {

            $mysqlUserRepo = new UserRepository();
            $user = $mysqlUserRepo->findUser($email);

    
            if(!$user){
                throw new Exception("Usuario não existe");
            }
    
            if($password != $user->password){
               throw new Exception("Senha incorreta");
            }

            $userMap = Usermap::UserMap($user);

            Session::signIn($userMap);

        } catch (Exception $e) {
            $message = $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }


       

    }

}