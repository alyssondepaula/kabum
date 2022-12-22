<?php

use Src\Modules\Addresses\Usecases\ShowOneAddressUserCase;
use Src\Modules\Addresses\Usecases\UpdateAddressUserCase;
use Src\Modules\Client\Usecases\UpdateClientUserCase;

echo '<style>'; 
include "editadressstyle.css"; 
echo '</style>';

  $id = $_GET['id'];
  $clientId = $_GET['clientId'];

  if(!isset($id)){
    header('location: /app');
  } 

  $address = ShowOneAddressUserCase::execute($id);

  if(!is_object($address)){
    header('location: /app');
    exit;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    UpdateAddressUserCase::execute(
        $id,
        $_POST['street'],
        $_POST['number'],
        $_POST['zip'],
        $_POST['complement'],
        $_POST['city'],
        $_POST['state'],
        isset($_POST['padrao']) ? 1 : 0,
        $clientId
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
        <h2>Editar endereço:</h2>
             <form method="post">
                <div>
                <div class="inrow">
                <div>
                <label>Rua:</label>
                <input type="text" minlength="6" maxlength="60" value="<?= $address->street ?>" name="street" required/>
                </div>
                <div>
                <label style="margin-left: 12;">N°:</label>
                <input type="text" pattern="\d*" minlength="4" maxlength="4" value=<?= $address->number ?> name="number"  required/>
                </div> 
                </div>
                <label>CEP:</label>
                <input type="text" pattern="\d*" minlength="8" maxlength="8" value=<?= $address->zip ?> name="zip"  required/>
                <label>Complemento:</label>
                <input type="text" minlength="10" maxlength="10" value=<?= $address->complement ?> name="complement"  required/>
                <label>Cidade:</label>
                <input type="text" minlength="10" maxlength="10" value=<?= $address->city ?> name="city"  required/>
                <label>Estado:</label>
                <select name="state" value="<?= $obCliente->estado ?>" required>
                <option selected>AC</option>
                <option>AL</option>
                <option>AP</option>
                <option>AM</option>
                <option>BA</option>
                <option>CE</option>
                <option>ES</option>
                <option>GO</option>
                <option>MA</option>
                <option>MT</option>
                <option>MS</option>
                <option>MG</option>
                <option>PA</option>
                <option>PB</option>
                <option>PR</option>
                <option>PE</option>
                <option>PI</option>
                <option>RJ</option>
                <option>RN</option>
                <option>RS</option>
                <option>RO</option>
                <option>RR</option>
                <option>SC</option>
                <option>SP</option>
                <option>SE</option>
                <option>TO</option>
                <option>DF</option>
              </select>
                 <div class="checkbox">
                <label>Endereço Padrão: </label>
                <input type="checkbox" 
                id="padrao" 
                name="padrao" 
                value="padrao"

                <?php 
                if($address->isDefault == 1){
                  echo 'checked';
                }
                ?>
                >
                </div>
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
  </main>
  </body>
  <?php include INCLUDES.'/Footer/index.php'; ?>
</html>