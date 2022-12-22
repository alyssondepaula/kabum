<?php

use Src\Modules\Client\Usecases\CreateClientUserCase;

echo '<style>'; 
include "createclientstyle.css"; 
echo '</style>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    CreateClientUserCase::execute(
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
        <h2>Cliente:</h2>
            <form method="post">
                <div>
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" required>
                <label>Data de Nascimento:</label>
                <input type="date" name="birthdate" class="form-control" required>
                <label>CPF:</label>
                <input type="text" name="cpf" class="form-control" required>
                <label>RG:</label>
                <input type="text" name="rg" class="form-control" required>
                <label>PHONE:</label>
                <input type="text" name="phone" class="form-control" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>