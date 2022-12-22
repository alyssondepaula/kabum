<?php
namespace Src\Modules\Client\Mappers;

use Src\Modules\Client\Entities\Client;

abstract class ClientMap {

    public static function ClientMap($id = "", $name, $birthDate, $cpf, $rg, $phone){

        $client = new Client();

        $client->id = $id;
        $client->name = $name;
        $client->birthDate = $birthDate;
        $client->cpf = $cpf;
        $client->rg = $rg;
        $client->phone = $phone;
      

        return $client;

    }
}
?>