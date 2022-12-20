<?php 
  echo "<style>";
  include 'index.css';
  echo "<style>";
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
  <?php include './src/components/footer/index.php' ?>
</html>