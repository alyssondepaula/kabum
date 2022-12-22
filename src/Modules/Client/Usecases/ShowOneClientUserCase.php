<?php
namespace Src\Modules\Client\Usecases;

use Exception;
use Src\Modules\Client\Mappers\ClientMap;
use Src\Modules\Client\Repositories\ClientRepository;


class ShowOneClientUserCase {

    static function execute($userId){

        try {
           
            $mysqlClientRepo = new ClientRepository();
            $client = $mysqlClientRepo->findClientById($userId);
            
            return $client;

        } catch (Exception $e) {
            return false;
        }
    }

}