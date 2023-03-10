<?php

namespace Src\Modules\Addresses\Usecases;

use Exception;
use Src\Modules\Addresses\Mappers\AddressMap;
use Src\Modules\Addresses\Repositories\AddressRepository;

class CreateAddressUserCase {

    static function execute($street, $number, $zip, $complement, $city, $state, $isDefault = 0, $clientId){

        try {

            $mysqlAddressRepo = new AddressRepository();

            $addressMap = AddressMap::AddressMap("",$street, $number, $zip, $complement, $city, $state, $isDefault, $clientId);
            $mysqlAddressRepo->create($addressMap);

            header('location: /addresses?id='.$clientId.'');

        } catch (Exception $e) {
            $message = $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }

}