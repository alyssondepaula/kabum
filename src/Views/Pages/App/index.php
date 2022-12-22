<?php

use Src\Modules\Client\Usecases\ShowAllClientUserCase;
use Src\Share\Session;

echo "<style>";
include 'app.css';
echo "</style>";

  $user = Session::getUser();

  $clients = ShowAllClientUserCase::execute($user['id']);
  $clientsrows = '';
  foreach ($clients as $client) {
    $clientsrows .= '<tr class="tablerow">
                    <td>' . $client['name'] . '</td>
                    <td>' . date('d/m/Y', strtotime($client['birthDate'])) . '</td>
                    <td>' . $client['cpf'] . '</td>
                    <td>' . $client['rg'] . '</td>
                    <td>' . $client['phone'] . '</td>
                    <td class="blank_col">
                    <a href=/addresses?id='. $client['id'].'>
                    <i class="fa-solid fa-truck" style="color: var(--orangePrimary)"></i>
                    </a>
                    </td>
                    <td class="blank_col">
                    <a href=/editclient?id='. $client['id'].'>
                       <i class="fa-solid fa-pen-to-square" style="color: var(--bluePrimary)"></i>
                    </a>
                    </td>
                  <td  class="blank_col">
                    <a href=deleteClient.php?id='. $client['id'] .'>
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
      
      if($clientsrows !== '') {
        
             
        echo "<h2>Meus Clientes:</h2><div class='scrolltable'>
        <table class='table'>
          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Data de Nascimento</th>
                  <th>CPF</th>
                  <th>RG</th>
                  <th>Telefone</th>
                  <th class='blank_col'></th>
                  <th class='blank_col'></th>
                  <th class='blank_col'></th>
              </tr>
          </thead>
          <tbody>
            $clientsrows
          </div>
          </tbody>
          </table>";


      }else{

        echo '<h2>Sem clientes cadastrados</h2>';


      }
      ?>
     </div>
     <a role="button" class="call" href="/createuser">Cadastrar cliente</a>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>