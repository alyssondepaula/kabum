<?php

use Src\Modules\Client\Entities\Client;
use Src\Modules\Client\Usecases\CreateClientUserCase;
use Src\Modules\Client\Usecases\ShowOneClientUserCase;
use Src\Modules\Client\Usecases\UpdateClientUserCase;

echo '<style>'; 
include "editclientstyle.css"; 
echo '</style>';

  $id = $_GET['id'];
  if(!isset($id)){
    header('location: /app');
  } 

  $client = ShowOneClientUserCase::execute($id);

  if(!is_object($client)){
    header('location: /app');
    exit;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    UpdateClientUserCase::execute(
        $id,
        $_POST['name'],
        $_POST['birthdate'],
        $_POST['cpf'],
        $_POST['rg'],
        $_POST['phone']
    );
}

  
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Editar Cliente - Gerenciador</title>
    </head>
<body>
  <?php include INCLUDES.'/Header/index.php'; ?>
  <main>
    <div class="content">
    <div>
    <a class="btnback" href="/app">Voltar</a>
    <div class="box">
        <h2>Editar: <?php  echo $client->name ?></h2>
             <form method="post">
                <div>
                <label>Nome:</label>
                <input type="text" name="name" minlength="3" maxlength="24" value="<?= $client->name ?>"  required/>
                <label>Data de Nascimento:</label>
                <input type="date" name="birthdate" min="1922-01-01" max="2022-12-31" max step="1" value=<?= $client->birthDate ?>  required/>
                <label>CPF: (Somente números)</label>
                <input type="text" name="cpf" pattern="\d*" minlength="11" maxlength="11" value=<?= $client->cpf ?>  required/>
                <label>RG: (Somente números)</label>
                <input type="text" name="rg" pattern="\d*" minlength="8" maxlength="8" value=<?= $client->rg ?>  required/>
                <label>PHONE: (Somente números)</label>
                <input type="text" name="phone" pattern="\d*" minlength="10" maxlength="11" value=<?= $client->phone ?>  required/>
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
        <div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>