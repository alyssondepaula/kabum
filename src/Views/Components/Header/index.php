<?php

use Src\Share\Session;

echo '<style>'; 
include "style.css"; 
echo '</style>';

function runMyFunction() {
  echo 'I just ran a php function';
}

if (isset($_GET['hello'])) {
  runMyFunction();
}
?>

<header>
<div class="upheader">

   <?php 
   
    if(Session::isAuth()){

      echo '<a role="button" href="app.php">Home</a>';

    }else {

      echo '<a role="button" href="index.php">Home</a>';

    }
  
   ?>
  
  
  <div>
   <?php 

    if(Session::isAuth()){

      echo '<a role="button" href="signout.php">Sair</a>';

    }else {

      echo '<a role="button" href="signin.php">Entrar</a>
      <span>&nbsp;/&nbsp;</span>
     <a role="button" href="signup.php">Cadastrar</a>';

    }
   ?>
   
  </div>
</div>
<div class="bottomheader"></div>
</header>