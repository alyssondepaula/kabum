<?php

use Src\Modules\Client\Usecases\DeleteClientUserCase;

   require_once 'bootstrap.php';
   DeleteClientUserCase::execute($_GET['id']);
   
?>