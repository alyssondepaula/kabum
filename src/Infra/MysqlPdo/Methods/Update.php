<?php

namespace Src\Infra\MysqlPdo\Methods;

use Src\Infra\MysqlPdo\Connection;

class Update {

    static function execute($table, $where, $values) {

        $connection = new Connection();

        $fields = array_keys($values);
        $query = 'UPDATE ' . $table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        return $connection->execute($query, array_values($values));
        
    }

}