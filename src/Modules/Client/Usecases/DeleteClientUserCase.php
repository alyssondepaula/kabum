<?php
namespace Src\Modules\Client\Usecases;

use Exception;
use Src\Modules\Client\Repositories\ClientRepository;


class DeleteClientUserCase {

    static function execute($userId){

        try {

            $mysqlClientRepo = new ClientRepository();
            $mysqlClientRepo->delete($userId);
            header("location: /app");

        } catch (Exception $e) {
            echo "<script type='text/javascript'>alert('erro ao deletar');</script>";
        }
    }

}