<?php

use Src\Modules\Users\Usecases\CreateAccountUserCase;

echo '<style>'; 
include "signupstyle.css"; 
echo '</style>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    CreateAccountUserCase::execute($_POST['name'],$_POST['email'],$_POST['password']);
}

  
?>
</style>

<!DOCTYPE html>
<html>
    <head>
         <title>Criar conta - Gerenciador Kabum</title>
    </head>
<body>
  <?php include INCLUDES.'/Header/index.php'; ?>
  <main>
    <div class="content">
    <div class="box">
        <h2>Crie sua conta!</h2>
            <form method="post">
                <div>
                <label>Nome:</label>
                <input type="text" minlength="3" maxlength="24" name="name" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" minlength="6" maxlength="24" name="password" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>