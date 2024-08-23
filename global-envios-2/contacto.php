<?php   
  if (!isset($_SESSION["form_submitted"])) {
    unset($_SESSION["zip"]);
    unset($_SESSION["venezuela-cities"]);
    unset($_SESSION["length"]);
    unset($_SESSION["width"]);
    unset($_SESSION["height"]);
    unset($_SESSION["weight"]);
  } else {
    unset($_SESSION["form_submitted"]); // Reset the flag
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/contacto.css">
  </head>
  <body>
    <div class="background-container">
      <div class="background-overlay"></div>
      <?php include("header.html");?>
      <div class="title-container">
        <p class="title-text">Contáctanos</p>
        <div class="subtitle-container">
          <div class="subtitle-container-inner">
            <p class="subtitle-text">
              para enviar tu encomienda de USA a:
            </p>
          </div>
          <div class="flags-subtitle">
            <div>
              <span><img class="flag-icon" src="icons/venezuela.svg" alt=""> Venezuela</span>
              <span><img class="flag-icon" src="icons/colombia.svg" alt=""> Colombia</span>
              <span><img class="flag-icon" src="icons/mexico.svg" alt=""> Mexico</span>
            </div>
            <div>
              <span><img class="flag-icon" src="icons/ecuador.svg" alt=""> Ecuador</span>
              <span><img class="flag-icon" src="icons/peru.svg" alt=""> Peru</span>
              <span><img class="flag-icon" src="icons/el-salvador.svg" alt=""> El Salvador</span>
            </div>
            <div>
              <span><img class="flag-icon" src="icons/guatemala.svg" alt=""> Guatemala</span>
              <span><img class="flag-icon" src="icons/dominican-republic.svg" alt=""> Dominicana</span>
              <span><img class="flag-icon" src="icons/honduras.svg" alt=""> Honduras</span>
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-row">
      <div>
        <i class="bx bxs-phone-call"></i>
        <h1>Teléfonos</h1>
        <p>612-353-4189</p>
        <p>612-234-0480</p>
      </div>
      <div>
        <i class="bx bxs-envelope"></i>
        <h1>Email</h1>
        <p>globalenviosxp@gmail.com</p>
      </div>
      <div>
        <i class="bx bxs-map"></i>
        <h1>Dirección</h1>
        <p>323 E Lake St, Minneapolis, MN, 55407</p>
        <p>6722 Penn Ave S, Richfield, MN, 55423</p>
      </div>
    </div>

    <div class="break-container">
      <div class="break"></div>
    </div>

    <div class="write-container">
      <div class="write-title-container">
        <h1>Escríbenos</h1>
        <div class="break-container-2">
          <div class="break-2"></div>
        </div>
        <p>Estamos aquí para atenderte y aclarar cualquier duda acerca de nuestros servicios.</p>
      </div>
      <div class="message-container">
        <span>Nombre</span>
        <input class="name-input" type="text" placeholder="Nombre">
        <span>Corréo Electronico</span>
        <input class="email-input" type="text" placeholder="Correo Electronico">
        <span>Mensaje</span>
        <textarea id="message-input" placeholder="Mensaje" cols="30" rows="10"></textarea>
        <div class="button-row">
          <button>enviar</button>
        </div>
      </div>
    </div>

    <div class="google-maps">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2823.7777241697877!2d-93.27432248784143!3d44.94818637094964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87f627f131738e91%3A0xa48a6031d3a0e95f!2sGlobal%20Envios%20Express!5e0!3m2!1sen!2sus!4v1714493938122!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </body>
</html>

<?php include("footer.html");?>