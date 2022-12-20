<?php

use Src\Share\Session;

  echo "<style>";
  include 'index.css';
  echo "<style>";
  
  require_once 'bootstrap.php'; 
?>
</style>

<!DOCTYPE html>
<html>
    <head>
         <title>Site Oficial - Gerenciador</title>
    </head>
<body>
<?php include './src/components/header/index.php' ?>
  <main>
    <div class="content">
        <h1 class="calltitle">Cadastrar</h1>
    </div>
  </main>
  </body>
  <?php include './src/components/footer/index.php' ?>
</html>