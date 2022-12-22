<?php
namespace Src\Modules\Addresses\Usecases;

use Exception;
use Src\Modules\Addresses\Repositories\AddressRepository;


class ShowAllAddressClientUserCase {

    static function execute($clientId){

        try {

            $mysqlAddressRepo = new AddressRepository();
            $addresses = $mysqlAddressRepo->ShowAll($clientId);
            return $addresses;

        } catch (Exception $e) {
            return false;
        }
    }

}