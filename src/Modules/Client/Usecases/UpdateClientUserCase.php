<?php

namespace Src\Modules\Client\Usecases;

use Exception;
use Src\Modules\Client\Mappers\ClientMap;
use Src\Modules\Client\Repositories\ClientRepository;


class UpdateClientUserCase {

    static function execute($id, $name, $birthDate, $cpf, $rg, $phone){

        try {

            $mysqlClientRepo = new ClientRepository();

            $clientMap = ClientMap::ClientMap($id, $name, $birthDate, $cpf, $rg, $phone);


            $mysqlClientRepo->update($clientMap);
      
            header('location: /app');

        } catch (Exception $e) {
            $message = $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }

}