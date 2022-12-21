<?php
namespace Src\Modules\Client\Repositories;

use Src\Infra\MysqlPdo\Methods\Select;

class ClientRepository
{

    public function ShowAll($userId) {
        
        $select = new Select();
        $results = $select->execute('clients')->fetchAll();
        return $results; 
    }

}