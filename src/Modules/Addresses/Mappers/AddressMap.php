<?php
namespace Src\Modules\Addresses\Mappers;

use Src\Modules\Addresses\Entities\Address;

abstract class AddressMap {

    public static function AddressMap($id = "", $street, $number, $zip, $complement = "", $city, $state, $isDefault, $clientId = "" ){

        $address = new Address();

        $address->id = $id;
        $address->street = $street;
        $address->number = $number;
        $address->zip = $zip;
        $address->complement = $complement;
        $address->state = $state;
        $address->city = $city;
        $address->isDefault = $isDefault;
        $address->clientId = $clientId;
    
        return $address;

    }
}
?>