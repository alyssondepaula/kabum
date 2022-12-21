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
         <title>Site Oficial - Gerenciador</title>
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
                <input type="text" name="name" class="form-control" required>
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>