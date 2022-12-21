<?php

namespace Src\Modules\Users\Repositories;

use PDO;
use Src\Infra\MysqlPdo\Methods\Insert;
use Src\Infra\MysqlPdo\Methods\Select;
use Src\Modules\Users\Entities\User;

class ClientRepository
{

    public function fetchAll($userId) {
        
        $select = new Select();
        $results = $select->execute('clients','userId = "'.$userId.'"')->fetchAll();    
        return $results; 
    }

    public function create($name, $email, $password){

        $insert = new Insert();

        $results = $insert->execute('users',[
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return $results;
    }
}