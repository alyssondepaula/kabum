<?php

namespace Src\Modules\Users\Repositories;

use PDO;
use Src\Infra\MysqlPdo\Methods\Insert;
use Src\Infra\MysqlPdo\Methods\Select;
use Src\Modules\Users\Entities\User;

class UserRepository
{
    public function findUser($email){

        $select = new Select($email);
        $results = $select->execute('users', 'email = "'.$email.'"')->fetchObject();

        return $results;
    }

    public function create($name, $email, $password){

        $insert = new Insert();

        $results = $insert->execute('users',[
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        
        $select = new Select();
        $results = $select->execute('users', 'id = "'.$results.'"')->fetchObject();

        return $results;
    }
}