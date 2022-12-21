<?php

namespace Src\Infra\MysqlPdo;

use \PDO;
use PDOException;

class Connection {

    const HOST = '127.0.0.1';
    const DB = 'db';
    const USER = 'user';
    const PASS = 'password';


    private $connection = "";

    public function __construct()
    {
        $this->setConnection();
    }

    

    private function setConnection() {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';dbname=' . self::DB,
                self::USER,
                self::PASS
            );

            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->connection;
    }

    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

   

}