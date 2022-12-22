<?php

use Src\Modules\Addresses\Usecases\ShowAllAddressClientUserCase;
use Src\Modules\Client\Usecases\ShowOneClientUserCase;
use Src\Share\Session;

echo "<style>";
include 'addressesstyle.css';
echo "</style>";

$id = $_GET['id'];
if(!isset($id)){
  header('location: /app');
} 

$user = Session::getUser();


$client = ShowOneClientUserCase::execute($id);

  if(!is_object($client)){
    header('location: /app');
    exit;
  }


  $addresses = ShowAllAddressClientUserCase::execute($id);
  $addressesrows = '';
  foreach ($addresses as $address) {
    $addressesrows .= '<tr class="tablerow">
                    <td class="blank_col">
                    <a href=selectIsDefault.php?id='. $address['id'].'&clientId='. $client->id.'>
                     <i class="'.($address['isDefault'] == 1 ? 'fa-solid ': 'fa-regular').' fa-circle" style="color: var(--orangePrimary)"></i>
                    </a>
                    </td>
                    <td>' . $address['street'] . '</td>
                    <td>' . $address['number'] . '</td>
                    <td>' . $address['zip'] . '</td>
                    <td>' . $address['complement'] . '</td>
                    <td>' . $address['city'] . '</td>
                    <td>' . $address['state'] . '</td>
                    <td class="blank_col">
                    <a href=/editaddress?id='. $address['id'].'&clientId='. $client->id.'>
                       <i class="fa-solid fa-pen-to-square" style="color: var(--bluePrimary)"></i>
                    </a>
                    </td>
                  <td  class="blank_col">
                    <a href=deleteAddress.php?id='. $address['id'].'&clientId='. $client->id.'>
                      <i class="fa-solid fa-trash" style="color: red"></i>
                    </a>
                  </td>
                  </tr>';
}


?>
</style>

<!DOCTYPE html>
<html>
    <head>
         <title>App - Gerenciador</title>
         <script src="https://kit.fontawesome.com/bd1ede2b87.js" crossorigin="anonymous"></script>
    </head>
<body>
   <?php include INCLUDES.'/Header/index.php'; ?>
  <main>
    <div class="content">
    <div class="box">

      <?php
      
      if($addressesrows !== '') {   
        echo "<h2>Endereços: $client->name </h2>
        <div class='scrolltable'>
        <table class='table'>
          <thead>
              <tr>
                  <th class='blank_col'>Padrão</th>
                  <th>Rua</th>
                  <th>Numero</th>
                  <th>CEP</th>
                  <th>Complemento</th>
                  <th>Cidade</th>
                  <th>Estado</th>
                  <th class='blank_col'></th>
                  <th class='blank_col'></th>
              </tr>
          </thead>
          <tbody>
            $addressesrows
          </div>
          </tbody>
          </table>";


      }else{

        echo '<h2>Sem endereços cadastrados</h2>';


      }
      ?>
     </div>
     <a role="button" class="call" href="/createaddress?id=<?php echo $client->id?>">Cadastrar Endereço</a> 
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>