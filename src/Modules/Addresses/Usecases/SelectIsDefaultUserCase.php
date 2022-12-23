<?php

namespace Src\Modules\Addresses\Usecases;

use Exception;
use Src\Modules\Addresses\Repositories\AddressRepository;

class SelectIsDefaultUserCase {

    static function execute($addressId, $clientId){

        try {

            $mysqlAddressRepo = new AddressRepository();
            
            $mysqlAddressRepo->selectIsDefault($addressId, $clientId);
     
            header('location: /addresses?id='.$clientId.'');
    
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }

}