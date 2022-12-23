<?php

use Src\Share\Session;

echo '<style>'; 
include "headerstyle.css"; 
echo '</style>';
?>

<header>
<div class="upheader">

   <?php 
   
    if(Session::isAuth()){

      echo '<a role="button" href="/app">Home</a>';

    }else {

      echo '<a role="button" href="/">Home</a>';

    }
  
   ?>
  
  
  <div>
   <?php 

    if(Session::isAuth()){

      echo '<a role="button" href="signout.php">Sair</a>';

    }else {

      echo '<a role="button" href="/signin">Entrar</a>
      <span>&nbsp;/&nbsp;</span>
     <a role="button" href="/signup">Cadastrar</a>';

    }
   ?>
   
  </div>
</div>
<div class="bottomheader"></div>
</header>