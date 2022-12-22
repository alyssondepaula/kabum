<?php
namespace Src\Modules\Addresses\Usecases;

use Exception;
use Src\Modules\Addresses\Repositories\AddressRepository;
use Src\Share\Session;

class DeleteAddressUserCase {

    static function execute($adressId, $clientId){

        try {

            $mysqlAddressRepo = new AddressRepository();
            $mysqlAddressRepo->delete($adressId);

            header('location: /addresses?id='.$clientId.'');

        } catch (Exception $e) {
            echo "<script type='text/javascript'>alert('erro ao deletar');</script>";
        }
    }

}