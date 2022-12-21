<?php

namespace Src\Modules\Users\Repositories;

use PDO;
use Src\Infra\MysqlPdo\Methods\Select;
use Src\Modules\Users\Entities\User;

class UserRepository
{
    public function findUser($email){

        $select = new Select($email);
        $results = $select->execute('users', 'email = "'.$email.'"')->fetchObject();
        
        return $results;

    }
}