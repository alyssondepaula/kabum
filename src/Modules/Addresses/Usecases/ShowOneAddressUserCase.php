<?php
namespace Src\Modules\Addresses\Usecases;

use Exception;
use Src\Modules\Addresses\Repositories\AddressRepository;

class ShowOneAddressUserCase {

    static function execute($adressId){

        try {
           
            $mysqlAddressRepo = new AddressRepository();
            $adress = $mysqlAddressRepo->findAdressById($adressId);
            
            return $adress;

        } catch (Exception $e) {
            return false;
        }
    }

}