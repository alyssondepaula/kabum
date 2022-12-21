<?php

namespace Src\Modules\Users\Usecases;

use Src\Modules\Users\Repositories\UserRepository;

use Exception;
use Src\Modules\Users\Mappers\Usermap;
use Src\Share\Session;

class CreateAccountUserCase {

    static function execute($name, $email, $password){

        try {

            $mysqlUserRepo = new UserRepository();
            $user = $mysqlUserRepo->findUser($email);
            
            if($user){

                throw new Exception("Usuario já existe");
            }

            $user = $mysqlUserRepo->create($name, $email, $password);
            $userMap = Usermap::UserMap($user);

            Session::signIn($userMap);


        } catch (Exception $e) {
            $message = $e->getMessage();
            if($message){
                echo "<script type='text/javascript'>alert('$message');</script>";
            }else{
                echo "<script type='text/javascript'>alert('Erro ao Cadastrar');</script>";
            }
            
        }


       

    }

}