<?php
namespace Src\Modules\Addresses\Repositories;

use Src\Infra\MysqlPdo\Methods\Delete;
use Src\Infra\MysqlPdo\Methods\Insert;
use Src\Infra\MysqlPdo\Methods\Select;
use Src\Infra\MysqlPdo\Methods\Update;
use Src\Modules\Addresses\Entities\Address;
use Src\Share\Session;

class AddressRepository
{

    public function findAdressById($adressId){

        $select = new Select();
        $results = $select->execute('addresses', 'id = "'.$adressId.'"')->fetchObject();

        return $results;
    }

    public function ShowAll($clientId) {
        
        $select = new Select();
        $results = $select->execute('addresses', 'clientId = "'.$clientId.'"')->fetchAll();
        return $results; 
    }

    static function create(Address $address){

        $insert = new Insert();

        echo $address->street;
        echo $address->number;
        echo $address->zip;
        echo $address->complement;
        echo $address->city;
        echo $address->state;
        echo $address->isDefault;
        echo $address->clientId;

       $results = $insert->execute('addresses',[
        'street' => $address->street,
        'number' => $address->number,
        'zip' => $address->zip,
        'complement' => $address->complement,
        'city' => $address->city,
        'state' => $address->state,
        'isDefault' => $address->isDefault,
        'clientId' => $address->clientId,
    ]);
        
        return $results;

    }

    static function update(Address $address){

        $update = new Update();
        
        if($address->isDefault == 1){
            $results = $update->execute('addresses', 
            'clientId = "'.$address->clientId.'"',[
            'isDefault' => 0
          ]);
        }
        $results = $update->execute('addresses', 
            'id = "'.$address->id.'"',[
            'street' => $address->street,
            'number' => $address->number,
            'zip' => $address->zip,
            'complement' => $address->complement,
            'city' => $address->city,
            'state' => $address->state,
            'isDefault' => $address->isDefault,
            'clientId' => $address->clientId,
        ]);

        
       return $results;

    }

    static function delete(int $addressId){

        $delete = new Delete();

        $results = $delete->execute('addresses', 'id = "'.$addressId.'"');
        return $results;
    }

    static function selectIsDefault(int $addressId, int $clientId){

        $update = new Update();

       $update->execute('addresses', 
        'clientId = "'.$clientId.'"',[
        'isDefault' => 0
      ]);

       $update->execute('addresses', 
        'id = "'.$addressId.'"',[
        'isDefault' => 1
        ]);

        return;
    }

}