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
         <title>Editar Endereço - Gerenciador</title>
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
                <input type="text" minlength="6" maxlength="48" value="<?= $address->street ?>" name="street" required/>
                </div>
                <div>
                <label style="margin-left: 12;">N°:</label>
                <input type="text" pattern="\d*" minlength="1" maxlength="4" value=<?= $address->number ?> name="number"  required/>
                </div> 
                </div>
                <label>CEP: (Somente números)</label>
                <input type="text" pattern="\d*" minlength="8" maxlength="8" value=<?= $address->zip ?> name="zip"  required/>
                <label>Complemento:</label>
                <input type="text" minlength="3" maxlength="24" value=<?= $address->complement ?> name="complement"  required/>
                <label>Cidade:</label>
                <input type="text" minlength="3" maxlength="24" value=<?= $address->city ?> name="city"  required/>
                <label><?= $address->state ?></label>
                <select name="state" required>
                <option <?php if($address->state == "AC") echo "selected" ?>>AC</option>
                <option <?php if($address->state == "AL") echo "selected" ?>>AL</option>
                <option <?php if($address->state == "AP") echo "selected" ?>>AP</option>
                <option <?php if($address->state == "AM") echo "selected" ?>>AM</option>
                <option <?php if($address->state == "BA") echo "selected" ?>>BA</option>
                <option <?php if($address->state == "CE") echo "selected" ?>>CE</option>
                <option <?php if($address->state == "ES") echo "selected" ?>>ES</option>
                <option <?php if($address->state == "GO") echo "selected" ?>>GO</option>
                <option <?php if($address->state == "MA") echo "selected" ?>>MA</option>
                <option <?php if($address->state == "MT") echo "selected" ?>>MT</option>
                <option <?php if($address->state == "MS") echo "selected" ?>>MS</option>
                <option <?php if($address->state == "MG") echo "selected" ?>>MG</option>
                <option <?php if($address->state == "PA") echo "selected" ?>>PA</option>
                <option <?php if($address->state == "PB") echo "selected" ?>>PB</option>
                <option <?php if($address->state == "PR") echo "selected" ?>>PR</option>
                <option <?php if($address->state == "PE") echo "selected" ?>>PE</option>
                <option <?php if($address->state == "PI") echo "selected" ?>>PI</option>
                <option <?php if($address->state == "RJ") echo "selected" ?>>RJ</option>
                <option <?php if($address->state == "RN") echo "selected" ?>>RN</option>
                <option <?php if($address->state == "RS") echo "selected" ?>>RS</option>
                <option <?php if($address->state == "RO") echo "selected" ?>>RO</option>
                <option <?php if($address->state == "RR") echo "selected" ?>>RR</option>
                <option <?php if($address->state == "SC") echo "selected" ?>>SC</option>
                <option <?php if($address->state == "SP") echo "selected" ?>>SP</option>
                <option <?php if($address->state == "SE") echo "selected" ?>>SE</option>
                <option <?php if($address->state == "TO") echo "selected" ?>>TO</option>
                <option <?php if($address->state == "DF") echo "selected" ?>>DF</option>
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