<?php

use Src\Share\Session;

echo '<style>'; 
include "signinstyle.css"; 
echo '</style>';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    Session::signIn(23);
     header('Location: app.php');
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
      <h2>Login</h2>
          <form method="post">
            <div>
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>