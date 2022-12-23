<?php

namespace Src\Infra\MysqlPdo\Methods;

use Src\Infra\MysqlPdo\Connection;

class Delete {

    static function execute($table, $where) {

     
            $connection = new Connection();
            $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;            
            return $connection->execute($query);
            
    }
    
}