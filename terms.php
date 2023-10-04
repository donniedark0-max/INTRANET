<?php
session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Intranet | EcoGestion - Politica  </title>
    <script src="https://cdn.tailwindcss.com"></script>
 <link rel="icon" href="assets/css/images/leaves.png">
    <link rel="stylesheet" href="assets/css/home.css">
        <link rel="stylesheet" href="assets/css/terms.css">

   <link
  rel="stylesheet"
  href="https://fonts.googleapis.com/icon?family=Material+Icons"
/> 
  </head>
  <body>
    

    <?php if(!empty($user)): ?>

  <header
    class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-3xl lg:max-w-screen-lg">
    <div class="px-4">
        <div class="flex items-center justify-between">
            <div class="flex shrink-0">
                <a aria-current="page" class="flex items-center" href="/">
                    <img class="h-7 w-auto" src="https://cdn-icons-png.flaticon.com/512/621/621715.png" alt="">
                    <p class="sr-only">Eco</p>
                </a>
            </div>
            <div class="hidden md:flex md:items-center md:justify-center md:gap-5">
                <a aria-current="page"
                    class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                    href="index.php#header">Inicio</a>
                <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                    href="index.php#history">Historia</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                    href="index.php#services">Servicios</a>
            </div>
            <div class="flex items-center justify-end gap-3">
               
                <a class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                    href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</header>


 <section id="banner">
      <div class="interior">

<div class="ache1"><h1 class="h1t ">Terminos de Uso del Sitio Web de EcoGestion</h1></div>
  <br/>
  <div class="inle">

 <h3 class="ht">Información Legal & Noticias</h3>
<br/>
  </div> 
 <section class="info">
<div class="linea " x-ms-format-detection="none"></div>
<br/>
<h2 class="hd">1. Uso del sitio web</h2>
  <p style="text-indent: 40px;">1.1. El sitio web de EcoGestion tiene como objetivo brindar información sobre nuestros servicios y facilitar el reporte de basura acumulada.</p>
  <p style="text-indent: 40px;">1.2. Al utilizar este sitio web, aceptas hacerlo de acuerdo con las leyes y regulaciones aplicables. No utilices este sitio para fines ilegales o no autorizados.</p>
  <p style="text-indent: 40px;">1.3. Nos reservamos el derecho de modificar, actualizar o discontinuar cualquier aspecto de este sitio web en cualquier momento sin previo aviso.</p>
  <br/>
  <h2 class="hd">2. Propiedad intelectual</h2>
  <p style="text-indent: 40px;">2.1. Todo el contenido presente en este sitio web, incluyendo textos, gráficos, logotipos, imágenes, videos y software, es propiedad de EcoGestion y está protegido por las leyes de propiedad intelectual.</p>
  <p style="text-indent: 40px;">2.2. No se permite la reproducción, distribución, modificación o uso no autorizado de ningún contenido de este sitio web sin el consentimiento previo por escrito de EcoGestion.</p>
  <br/>
  <h2 class="hd">3. Privacidad</h2>
  <p style="text-indent: 40px;">3.1. La recopilación y el uso de los datos personales en EcoGestion están sujetos a nuestra Política de Privacidad. Al utilizar este sitio web, aceptas nuestras prácticas de privacidad.</p>
  <br/>
  <h2 class="hd">4. Responsabilidad</h2>
  <p style="text-indent: 40px;">4.1. EcoGestion no se hace responsable de cualquier daño, pérdida o perjuicio derivado del uso o la imposibilidad de uso de este sitio web.</p>
  <p style="text-indent: 40px;">4.2. No garantizamos la disponibilidad continua y sin interrupciones de este sitio web, ni la exactitud, confiabilidad o completitud de la información presentada en el mismo.</p>
  <p style="text-indent: 40px;">4.3. Es tu responsabilidad tomar las medidas necesarias para protegerte de virus u otros elementos destructivos mientras utilizas este sitio web.</p>
  <br/>
  <h2 class="hd">5. Enlaces a otros sitios web</h2>
  <p style="text-indent: 40px;">5.1. Este sitio web puede contener enlaces a otros sitios web de terceros que no están bajo nuestro control. No nos responsabilizamos por el contenido, la precisión o las prácticas de privacidad de dichos sitios web.</p>
  <br/>
  <h2 class="hd">6. Ley aplicable</h2>
  <p style="text-indent: 40px;">6.1. Estos Términos de Uso se regirán e interpretarán de acuerdo con las leyes de Perú. Cualquier disputa que surja en relación con este sitio web estará sujeta a la jurisdicción exclusiva de los tribunales de Perú.</p>
  <br/>
 </section>

</div> 
  <br/>
  <p class="inf">Si tienes alguna pregunta o inquietud relacionada con nuestros Términos de Uso, por favor contáctanos.</p>
    <br/>
  <p class="inf">Estamos comprometidos a proporcionarte un entorno seguro y confiable para utilizar nuestros servicios y sitio web. Al acceder y utilizar nuestro sitio web, aceptas cumplir con estos Términos de Uso. Si no estás de acuerdo con alguno de los términos, te recomendamos que no utilices nuestro sitio web.</p>
  <br/>
<p class="inf">Nos reservamos el derecho de modificar o actualizar estos Términos de Uso en cualquier momento sin previo aviso. Te recomendamos revisar periódicamente esta página para estar al tanto de cualquier cambio. El uso continuado de nuestro sitio web después de la publicación de cambios constituye tu aceptación de dichos cambios.</p>
<br/>
<p class="inf">Si tienes alguna pregunta o inquietud relacionada con nuestros Términos de Uso, no dudes en contactarnos. Estamos aquí para brindarte la información que necesites.</p>
&nbsp;<br>
<h2 class="hd">Información</h2>
      <p class="inf" style="font-style: italic;">La información contenida en este sitio web está sujeta a cambios sin previo aviso.</p>
<p class="inf" style="font-style: italic;"> Copyright © 2023 Ecogestion S.A.C. Todos los derechos reservados.</p>
<p class="inf" style="font-style: italic;">EcoGestion S.A.C., Calle Los Cedros #345, Colonia Verde, Ciudad Sustentable, Perú. </p>
<br/>
<p  class="inf pb-10">Actualizado por el equipo legal de Ecogestion el 26 de abril de 2023</p>
  </section>


 <!-- Footer -->
    <footer id="ac-globalfooter">
      <div class="ac-gf-content">
        <div class="ecotip">Eco tip: La Tierra es nuestro hogar, cuidémosla. Reciclando, reduciendo, y reutilizando.</div>        
      

     <!--1fotter--> 
      <section class="ac-gf-footer">
<div class="ac-gf-footer-shop" x-ms-format-detection="none"></div>
            <div class="ac-gf-footer-locale">
                <a>Perú</a>
            </div>
            <div class="ac-gf-footer-legal">
                <div class="ac-gf-footer-legal-copyright">Copyright ©  2023 EcoGestion S.A.C. Todos los derechos reservados.</div>
                <div class="ac-gf-footer-legal-links"> 
<a class="ac-gf-footer-legal-link" href="policy.php">Política de Privacidad</a> 
<a class="ac-gf-footer-legal-link" href="terms.php">Terminos de Uso</a> 
<a class="ac-gf-footer-legal-link" href="https://ecoges02.web.app/legal.html">Legal</a>                 

</div>
            </div>
</section>
      </div>
    </footer>

<?php else: ?>
      <h1 class="text-center pt-20 text-5xl pb-5">Crea una cuenta o inicia sesión en Ecogestion</h1>
<div class="flex items-center justify-center">
  <p class="pt-20 text-3xl no-underline">
      <a class="text-blue-700 hover:text-blue-900 no-underline" href="login.php">Inicia Sesión </a> o
      <a class="text-blue-700 hover:text-blue-900 no-underline" href="signup.php"> Regístrate</a>
    </p>
</div>
    <?php endif; ?>

    </body>


</html>