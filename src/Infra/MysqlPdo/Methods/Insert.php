<?php

namespace Src\Infra\MysqlPdo\Methods;

use Src\Infra\MysqlPdo\Connection;

class Insert {

    static function execute($table, $values) {

        $connection = new Connection();
        
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO ' . $table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $connection->execute($query, array_values($values));

        return $connection->getConnection()->lastInsertId();

    }
    
}