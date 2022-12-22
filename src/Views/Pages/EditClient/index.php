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
         <title>Site Oficial - Gerenciador</title>
    </head>
<body>
  <?php include INCLUDES.'/Header/index.php'; ?>
  <main>
    <div class="content">
    <div class="box">
        <h2>Editar: <?php  echo $client->name ?></h2>
             <form method="post">
                <div>
                <label>Nome:</label>
                <input type="text" minlength="2" maxlength="60" value="<?= $client->name ?>" name="name" required/>
                <label>Data de Nascimento:</label>
                <input type="date" min="1922-01-01" max="2022-12-31" max step="1" value=<?= $client->birthDate ?> name="birthdate" class="form-control" required/>
                <label>CPF:</label>
                <input type="text" pattern="\d*" minlength="11" maxlength="11" value=<?= $client->cpf ?> name="cpf" class="form-control" required/>
                <label>RG:</label>
                <input type="text" pattern="\d*" minlength="11" maxlength="11" value=<?= $client->rg ?> name="rg" class="form-control" required/>
                <label>PHONE:</label>
                <input type="text" pattern="\d*" minlength="10" maxlength="11" value=<?= $client->phone ?> name="phone" class="form-control" required maxlength="4"/>
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>