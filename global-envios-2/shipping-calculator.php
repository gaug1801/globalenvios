<?php
  session_start();
  include("db_configuration.php");

  if (isset($_GET['session_cleanup']) && $_GET['session_cleanup'] === 'true') {
    // Unset session variables
    unset($_SESSION["zip"]);
    unset($_SESSION["venezuela-cities"]);
    unset($_SESSION["length"]);
    unset($_SESSION["width"]);
    unset($_SESSION["height"]);
    unset($_SESSION["weight"]);
    unset($_SESSION["form_submitted"]); // Remove the form submitted flag
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/shipping-calculator.css">
  </head>
  <body>
    <div class="background-container">
      <div class="background-overlay"></div>
      <?php include("header.html"); ?>
      <div class="title-container">
        <p class="title-text">CALCULADORA DE ENVIOS</p>
        <div class="subtitle-container">
          <div class="subtitle-container-inner">
            <p class="subtitle-text">
              Conoce el costo de tu envío marítimo o aéreo desde USA hacia Venezuela
            </p>
          </div>
        </div>
      </div>
    </div>

    <?php
  $shipping_price = "";



  if (isset($_POST["submit"])) {
    $_SESSION["zip"] = $_POST["zip"];
    $_SESSION["venezuela-cities"] = $_POST["venezuela-cities"];
    $_SESSION["length"] = $_POST["length"];
    $_SESSION["width"] = $_POST["width"];
    $_SESSION["height"] = $_POST["height"];
    $_SESSION["weight"] = $_POST["weight"];
    $_SESSION["form_submitted"] = true;

    $zip = $_SESSION["zip"];
    $dest = str_replace("-", " ", $_SESSION["venezuela-cities"]); 
    $length = $_SESSION["length"];
    $width = $_SESSION["width"];
    $height = $_SESSION["height"];
    $weight = $_SESSION["weight"];

    $sql = "SELECT zone FROM venezuela_cities WHERE NAME = '$dest'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $zone = $row['zone'];

      if ($zone == 1) {
        $shipping_price = (($length * $width * $height) / 1782) * 35;
      } else {
        $shipping_price = ((($length * $width * $height) / 1782) * 35) + 10;
      }
    } else {
      echo "City not found.";
    }
  }
?>

    <form action="shipping-calculator.php" method="post" class="calculator-container">
      <div class="calculator-container-inner">
        <?php if (($shipping_price === "")): ?>
          <div class="progress-container">
            <div class="current-step">1</div>
            <div class="progress-line"></div>
            <div class="next-step">2</div>
          </div>
          <div class="instructions-container">
            <p class="instruction">Ingresa todos los datos solicitados a continuación:</p>
          </div>
       
          <div class="origin-container">
            <div class="origin-title"><h4>ORIGEN <img src="icons/us.svg" alt=""></h4></div>
            <div class="input-container-row">
              <div class="origin-input">
                <span>Código Postal (USA)</span>
                <input name="zip" type="text" value="<?php echo isset($_SESSION['zip']) ? $_SESSION['zip'] : ''; ?>" required>
              </div>
            </div>
          </div>
          <div class="destination-container">
            <div class="destination-title"> <h4>DESTINO <img src="icons/venezuela.svg" alt=""></h4></div>
            <div class="input-container-row">
              <div class="destination-input">
                <span>Ciudad de Venezuela</span>
                <select name="venezuela-cities" id="venezuela-cities" required>
                <option value="default" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'default') ? 'selected' : ''; ?>>Elija una ciudad</option>
                  <option value="puerto-cabello" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'puerto-cabello') ? 'selected' : ''; ?>>Puerto Cabello</option>
                  <option value="valencia" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'valencia') ? 'selected' : ''; ?>>Valencia</option>
                  <option value="caracas" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'caracas') ? 'selected' : ''; ?>>Caracas</option>
                  <option value="la-guaira" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'la-guaira') ? 'selected' : ''; ?>>La Guaira</option>
                  <option value="merida" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'merida') ? 'selected' : ''; ?>>Mérida</option>
                  <option value="puerto-la-cruz" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'puerto-la-cruz') ? 'selected' : ''; ?>>Puerto La Cruz</option>
                  <option value="barquisimeto" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'barquisimeto') ? 'selected' : ''; ?>>Barquisimeto</option>
                  <option value="maracaibo" <?php echo (isset($_SESSION['venezuela-cities']) && $_SESSION['venezuela-cities'] == 'maracaibo') ? 'selected' : ''; ?>>Maracaibo</option>
                </select>
              </div>
            </div>
          </div>
          <div class="dimensions-container">
            <div class="dimensions-title"> <h4>DIMENSIONES</h4></div>
            <div class="dimensions-row">
              <div class="dimensions">
                <span>Alto (Pulgadas)</span>
                <input name="height" type="number" value="<?php echo isset($_SESSION['height']) ? $_SESSION['height'] : ''; ?>" required>
              </div>
              <div class="dimensions">
                <span>Largo (Pulgadas)</span>
                <input name="length" type="number" value="<?php echo isset($_SESSION['length']) ? $_SESSION['length'] : ''; ?>" required>
              </div>
              <div class="dimensions">
                <span>Ancho (Pulgadas)</span>
                <input name="width" type="number" value="<?php echo isset($_SESSION['width']) ? $_SESSION['width'] : ''; ?>" required>
              </div>
            </div>
          </div>
          <div class="weight-container">
            <div class="weight-title"> <h4>PESO</h4></div>
            <div class="weight-input-container">
              <span>Peso en libras</span>
              <input name="weight" type="number" value="<?php echo isset($_SESSION['weight']) ? $_SESSION['weight'] : ''; ?>" required>
            </div>
          </div>
          <div class="button-container">
            <button type="submit" name="submit" class="next-button">siguiente</button>
          </div>
        <?php else: ?>
          <div class="result-container">
            <div class="progress-container">
              <div class="last-step">1</div>
              <div class="progress-line"></div>
              <div class="current-step">2</div>
            </div>
            <p class="result-title">COSTOS ESTIMADOS</p>
            <div class="result-input-container">
              <div class="result-row">
              <p>Costo del servicio maritimo (USD $)</p>
              <input class="result-display" type="text" value="<?php echo round($shipping_price, 2); ?>" readonly>
              </div>
            </div>
            <div class="button-row">
              <button class="prev-button">anterior</button>
              <button class="send-button">enviar</button>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </form>
  </body>
</html>

<?php include("footer.html");
  session_end();?>
