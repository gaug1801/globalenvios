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
    <link rel="stylesheet" href="style/servicios.css">
  </head>
  <body>
    <div class="background-container">
      <div class="background-overlay"></div>
      <?php include("header.html"); ?>
      <div class="title-container">
        <p class="title-text">SERVICIOS</p>
        <div class="subtitle-container">
          <div class="subtitle-container-inner">
            <p class="subtitle-text">
              Nuestros envíos llegan a:
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

    <div class="services-container">
      <div class="service-row-container">
        <div class="service-image-container">
          <img src="images/MicrosoftTeams-image-6.jpg" alt="">
        </div>
        <div class="service-row-body">
          <h2>Envío de Cajas</h2>
          <div class="break"></div>
          <div class="service-text-container">
            <span class="services-text">
              En <strong>Global Envios</strong>, nuestro servicio de envíos es simple y eficiente, facilitando el transporte de sus paquetes con rapidez y seguridad. Nos encargamos de todo el proceso para que pueda disfrutar de una experiencia sin complicaciones.
            </span>
          </div>
        </div>
      </div>
      <div class="service-row-container">
        <div id="domicilio" class="service-row-body-2">
          <h2>Envíos de Dinero</h2>
          <div class="break"></div>
          <div class="service-text-container">
            <span class="services-text">
              En <strong>Global Envios</strong>, facilitamos sus transferencias de dinero a Centroamérica y Sudamérica con rapidez, seguridad y sin complicaciones, asegurando que su dinero llegue de manera eficiente y confiable. Nuestro equipo profesional ofrece un servicio personalizado adaptado a sus necesidades, brindándole la tranquilidad de que su dinero está en buenas manos.
            </span>
          </div>
        </div>
        <div class="service-image-container">
          <img src="images/money-umbrella.jpg" alt="">
        </div>
        
      </div>
      <div class="service-row-container">
        <div class="service-image-container">
          <img src="images/meeting.jpg" alt="">
        </div>
        <div class="service-row-body">
          <h2>Servicios Paralegales</h2>
          <div class="break"></div>
          <div class="service-text-container">
            <span class="services-text">
              En <strong>Global Envios</strong> simplificamos el acceso a servicios paralegales con un enfoque profesional, ofreciendo asistencia en la preparación y gestión de documentos legales con precisión y eficacia. Nuestro equipo experimentado maneja cada trámite con cuidado, brindándole la confianza de que su documentación está en manos expertas.
            </span>
          </div>
        </div>
      </div>
      <div class="service-row-container">
        <div class="service-row-body-2">
          <h2>Notarización</h2>
          <div class="break"></div>
          <div class="service-text-container">
            <span class="services-text">
            En <strong>Global Envios</strong>, hacemos que el proceso de notaría sea sencillo y eficiente, ofreciendo servicios precisos y confiables como la certificación de documentos y validación de firmas. Nuestro equipo de notarios garantiza precisión y rapidez, asegurando el mayor cuidado y profesionalismo en el tratamiento de sus documentos.
            </span>
          </div>
        </div>
        <div class="service-image-container">
          <img src="images/notary-sign.jpg" alt="">
        </div>
      </div>
    </div>
  </body>
</html>

<?php include("footer.html");?>