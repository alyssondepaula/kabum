<?php
namespace Src\Modules\Client\Repositories;

use Src\Infra\MysqlPdo\Methods\Delete;
use Src\Infra\MysqlPdo\Methods\Insert;
use Src\Infra\MysqlPdo\Methods\Select;
use Src\Infra\MysqlPdo\Methods\Update;
use Src\Modules\Client\Entities\Client;
use Src\Share\Session;

class ClientRepository
{
    public function findClient($cpf){

        $user = Session::getUser();

        $select = new Select();
        $results = $select->execute('clients', 'cpf = "'.$cpf.'" AND userId = "'.$user['id'].'"')->fetchObject();

        return $results;
    }

    public function findClientById($id){

        $user = Session::getUser();

        $select = new Select();
        $results = $select->execute('clients', 'id = "'.$id.'" AND userId = "'.$user['id'].'"')->fetchObject();

        return $results;
    }

    public function ShowAll($userId) {
        
        $select = new Select();
        $results = $select->execute('clients', 'userId = "'.$userId.'"')->fetchAll();
        return $results; 
    }

    static function create(Client $client){

        $insert = new Insert();

        $user = Session::getUser();

        $results = $insert->execute('clients',[
            'name' => $client->name,
            'birthDate' => $client->birthDate,
            'cpf' => $client->cpf,
            'rg' => $client->rg,
            'phone' => $client->phone,
            'userId' => $user['id']
        ]);
        
        return $results;

    }

    static function update(Client $client){

        $update = new Update();

        $user = Session::getUser();


        $results = $update->execute('clients', 
            'id = "'.$client->id.'" AND userId = "'.$user['id'].'"',[
            'name' => $client->name,
            'birthDate' => $client->birthDate,
            'cpf' => $client->cpf,
            'rg' => $client->rg,
            'phone' => $client->phone,
            'userId' => $user['id']
        ]);
        
        return $results;

    }

    static function delete(int $id){

        $delete = new Delete();
       // $delete->execute('addresses', 'id = "'.$id.'"');
        
        $results = $delete->execute('clients', 'id = "'.$id.'"');
       return $results;
       return;
    }

}