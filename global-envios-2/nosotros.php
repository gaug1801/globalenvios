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
    <link rel="stylesheet" href="style/nosotros-body.css">
    <link rel="stylesheet" href="style/footer.css">
  </head>
  <body style="padding: 0; margin: 0;">
    <div class="background-container">
      <div class="background-overlay"></div>
     <?php include("header.html");?>

      <div class="title-container">
        <p class="title-text">ACERCA DE NOSOTROS</p>
        <p class="subtitle-text">Enviamos tu carga y dinero de USA a Sur America</p>
      </div>
    </div>

    <div class="nosotros-container">
      <div class="nosotros-title-container">
        <span class="nosotros-title">QUIENES SOMOS?</span>  
      </div>
      <div class="nosotros-text-container">
        <span class="nosotros-body-1">Somos una pequeña empresa con dos sucursales dedicadas a ofrecer una amplia gama de servicios, incluyendo transferencias de dinero, envíos de cajas a Centroamérica y Sudamérica, servicios notariales, trabajos paralegales, traducciones y fotos para pasaportes.</span>
        <span class="nosotros-body-2">Contamos con un equipo de profesionales experimentados que se encargan de cada detalle, asegurando que todos nuestros servicios se realicen de manera eficiente y segura. Nos encargamos de todo el proceso, desde la recepción inicial hasta la entrega final, incluyendo el almacenamiento, los trámites aduanales y fiscales, y el transporte.</span>
        <span class="nosotros-body-2">Nuestro compromiso va más allá de ser una simple empresa de servicios. Queremos ser su aliado de confianza, proporcionando soluciones especializadas y personalizadas que se adapten a sus necesidades, siempre garantizando tiempos de entrega óptimos y costos accesibles.</span>
      </div>
    </div>

    <div class="background-container">
      <div class="background-overlay"></div>
    </div>

    <div class="mission-container">
      <div class="mission-vision-container">
        <div class="our-mission-container-text">
          <p class="our-mission-title">NUESTRA MISIÓN</p>
          <div class="breaker"></div>
          <p class="our-mission-body">Nuestra misión es brindar a nuestros clientes un servicio excepcional, actuando como su socio logístico confiable. Nos esforzamos por asegurar rapidez, costos accesibles y la máxima seguridad en todas las operaciones, con el objetivo de sobresalir en un mercado competitivo y hacer una diferencia significativa para nuestros clientes.</p>
        </div>
        <div class="our-vision-container-text">
          <p class="our-vision-title">NUESTRA VISIÓN</p>
          <div class="breaker"></div>
          <p class="our-vision-body">Aspiramos a ser reconocidos como el socio más confiable y destacado para nuestros clientes, gracias a la excelencia en la prestación de todos nuestros servicios. Desde envíos de carga a Centroamérica y Sudamérica, hasta transferencias de dinero, servicios notariales, trabajos paralegales, traducciones y fotos para pasaportes, nuestro compromiso es proporcionar un servicio de calidad superior que nos posicione como la mejor opción en el mercado.</p>
        </div>
      </div>
      <div class="our-values-container">
        <p class="our-values-title">NUESTROS VALORES</p>
        <div class="our-values-body">
          <div class="breaker"></div>
          <p><span>+</span>Honestidad</p>
          <p><span>+</span>Responsabilidad</p>
          <p><span>+</span>Confianza</p>
          <p><span>+</span>Sentido</p>
          <p><span>+</span>Sentido de pertenencia</p>
          <p><span>+</span>Pasión</p>
          <p><span>+</span>Integridad</p>
        </div>
      </div>
    </div>
  </body>
</html>

<?php include("footer.html");?>