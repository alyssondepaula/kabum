<?php
namespace Src\Modules\Client\Usecases;

use Exception;
use Src\Modules\Client\Repositories\ClientRepository;


class ShowAllClientUserCase {

    static function execute($userId){

        try {

            $mysqlClientRepo = new ClientRepository();
            $clients = $mysqlClientRepo->ShowAll($userId);
            return $clients;

        } catch (Exception $e) {
            return false;
        }
    }

}