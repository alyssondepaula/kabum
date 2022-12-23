<?php

use Src\Modules\Users\Usecases\LoginUserCase;

echo '<style>'; 
include "signinstyle.css"; 
echo '</style>';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      LoginUserCase::execute($_POST['email'],$_POST['password']);
  }

?>
</style>

<!DOCTYPE html>
<html>
    <head>
         <title>Login - Gerenciador Kabum</title>
    </head>
<body>
<?php include INCLUDES.'/Header/index.php'; ?>
  <main>
    <div class="content">
      <div class="box">
      <h2>Bem vindo de volta ;)</h2>
          <form method="post">
            <div>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" minlength="6" maxlength="24" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>