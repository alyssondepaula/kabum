<?php

use Src\Modules\Client\Usecases\ShowAllClientUserCase;

echo "<style>";
include 'app.css';
echo "</style>";

  $clients = ShowAllClientUserCase::execute(1);
  $clientsrows = '';
  foreach ($clients as $client) {
    $clientsrows .= '<tr class="tablerow">
                    <td>' . $client['name'] . '</td>
                    <td>' . $client['data_nascimento'] . '</td>
                    <td>' . $client['cpf'] . '</td>
                    <td>' . $client['rg'] . '</td>
                    <td>' . $client['telefone'] . '</td>
                    <td class="blank_col">
                        <a >
                           <i class="fa-solid fa-pen-to-square" style="color: blue"></i>
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
         <title>Site Oficial - Gerenciador</title>
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
              </tr>
          </thead>
          <tbody>
            $clientsrows
          </div>
          </tbody>
          </table>";


      }else{

        echo ' <h2>Sem clientes cadastrados</h2>';


      }
      ?>
     </div>
     <a role="button" class="call" href="/app">Cadastrar cliente</a>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>