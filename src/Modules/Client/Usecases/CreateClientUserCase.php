<?php

namespace Src\Modules\Client\Usecases;

use Exception;
use Src\Modules\Client\Mappers\ClientMap;
use Src\Modules\Client\Repositories\ClientRepository;


class CreateClientUserCase {

    static function execute($name, $birthDate, $cpf, $rg, $phone){

        try {

            $mysqlClientRepo = new ClientRepository();
            
            $client = $mysqlClientRepo->findClient($cpf);

    
            if($client){
                throw new Exception("Cliente já existe");
            }

            $clientMap = ClientMap::ClientMap("", $name, $birthDate, $cpf, $rg, $phone);

            $mysqlClientRepo->create($clientMap);

            header('location: /app');

        } catch (Exception $e) {
            $message = $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }

}