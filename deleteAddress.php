<?php

use Src\Modules\Addresses\Usecases\DeleteAddressUserCase;

   require_once 'bootstrap.php';
   DeleteAddressUserCase::execute($_GET['id'], $_GET['clientId']);
   
?>