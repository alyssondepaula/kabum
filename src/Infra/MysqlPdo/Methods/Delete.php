<?php

namespace Src\Infra\MysqlPdo\Methods;

use Src\Infra\MysqlPdo\Connection;

class Delete {


    static function execute($table, $where) {

        try {
            $connection = new Connection();
            $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;            
            $connection->execute($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }


    }
    
}