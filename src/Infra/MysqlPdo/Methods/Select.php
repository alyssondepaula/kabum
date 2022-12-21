<?php

namespace Src\Infra\MysqlPdo\Methods;

use Src\Infra\MysqlPdo\Connection;

class Select {

  

    static function execute($table, $where = null, $order = null, $limit = null, $fields = '*') {

        $connection = new Connection(); 
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $table . ' ' . $where . ' ' . $order . ' ' . $limit;
        
        return $connection->execute($query);

    }

}