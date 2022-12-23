<?php

use Src\Modules\Client\Usecases\CreateClientUserCase;
use Src\Share\Session;

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

 $user = Session::getUser();
  
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Criar Cliente - Gerenciador</title>
    </head>
<body>
  <?php include INCLUDES.'/Header/index.php'; ?>
  <main>
    <div class="content">
    <div>
    <a class="btnback" href="/app" >Voltar</a>
    <div class="box">
        <h2>Criar Cliente:</h2>
            <form method="post">
                <div>
                <label>Nome:</label>
                <input type="text" name="name" minlength="3" maxlength="24" required>
                <label>Data de Nascimento:</label>
                <input type="date" name="birthdate" min="1922-01-01" max="2022-12-31" max step="1" required>
                <label>CPF: (Somente números) </label>
                <input type="text" name="cpf" pattern="\d*" minlength="11" maxlength="11" required>
                <label>RG: (Somente números)</label>
                <input type="text" name="rg" pattern="\d*" minlength="8" maxlength="8" required>
                <label>PHONE: (Somente números)</label>
                <input type="text" name="phone" pattern="\d*" minlength="10" maxlength="11" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
      </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>