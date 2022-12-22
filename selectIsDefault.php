<?php

use Src\Modules\Addresses\Usecases\SelectIsDefaultUserCase;

   require_once 'bootstrap.php';
   SelectIsDefaultUserCase::execute($_GET['id'], $_GET['clientId']);
   
?>