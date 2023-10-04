<?php
  session_start();


  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_usuario, email, password FROM users WHERE id_usuario = :id');
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
    <title>Intranet | EcoGestion  </title>
    <script src="https://cdn.tailwindcss.com"></script>
 <link rel="icon" href="assets/css/images/leaves.png">
    <link rel="stylesheet" href="assets/css/home.css">
   <link
  rel="stylesheet"
  href="https://fonts.googleapis.com/icon?family=Material+Icons"
/> 
  </head>
  <body>
    

    <?php if(!empty($user)): ?>

<script>
  



function topFunction() {
	document.body.scrollTop = 0; 
	document.documentElement.scrollTop = 0; 
}





</script>

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
                <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                    href="servicios.php">Servicios</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                    href="#contact">Reporte</a>
            </div>
            <div class="flex items-center justify-end gap-3">
               
                <a class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                    href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</header>
      
      <header id="header" class="cards1 items-center justify-center">
            <div class="header-content  flex flex-col items-center justify-center">
                    <div class="row">
                        <div class="items-center">
                            <h1 class=" typewriter text-3xl text-center"> ¡Juntos podemos construir un futuro más sostenible para todos!</h1>
                            <div class="pt-10">
                            <a class="btn-solid-lg text-lg" href="#contact">Reportar</a>
</div>
                            <a class="arrow" href="#introduction"><img src="assets/css/images/arrow.svg"/></a>
                        </div> 
                    </div>
            </div>

              <video autoPlay loop muted id="video-background">
                <source src="assets/css/images/header.mp4" type="video/mp4" />
              </video>
</header>


        

         <div id="contact" class="form-1 justify-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="h2-heading text-7xl font-bold pb-5">Reporte</h2>
                        <p class="pb-5 text-3xl sm:text-xl">En cada reporte de residuos se esconden las pequeñas revoluciones del cuidado y la conciencia. Tu voz es el eco que transforma el mundo. ¡Gracias por ser parte de este nuevo amanecer ecológico!</p>
                      
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        

                       <form id="reporteForm" action="procesar_reportes.php" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control-input" id="nombre" placeholder="Nombre" required/>
  </div>                      
  <div class="form-group">
    <label for="dni">DNI</label>
    <input type="text" name="dni" class="form-control-input" id="dni" placeholder="DNI" required/>
  </div>
  <div class="form-group">
    <label for="numero">Número</label>
    <input type="text" name="numero" class="form-control-input" id="numero" placeholder="Número" required/>
  </div>
  <div class="form-group">
    <label for="ubicacion">Ubicación</label>
    <input type="text" name="ubicacion" class="form-control-input" id="ubicacionInput" name="ubicacion"placeholder="Ubicación" required />
  </div>
  <div class="form-group">
    <label for="reporte">Reporte</label>
    <textarea name="reporte" class="form-control-textarea" id="reporte" placeholder="Reporte" required></textarea>
  </div>
  <div class="form-group">
    
   <button type="button" onclick="obtenerUbicacion()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Obtener ubicación
  </button>
  </div>
  <div class="form-group">
    <input type="hidden" name="action" value="procesar_reportes.php">
    <button type="submit" class="form-control-submit-button text-2xl">Enviar</button>
  </div>
</form>
                        
<script>
function obtenerUbicacion() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var latitud = position.coords.latitude;
      var longitud = position.coords.longitude;
      var ubicacion = latitud + ', ' + longitud;
      
      document.getElementById("ubicacionInput").value = ubicacion;
    });
  } else {
    alert("Tu navegador no soporta la geolocalización.");
  }
}
</script>
                    </div> 
                </div> 
            </div> 
        </div> 
  
<footer id="ac-globalfooter">
      <div class="ac-gf-content">
        <div class="ecotip pt-5">Eco tip: Apaga tus dispositivos electrónicos cuando no los estés usando. Aunque no los estés utilizando, siguen consumiendo energía en modo stand-by.</div>


        <!--1fotter-->
        <section class="ac-gf-footer">
          <div class="ac-gf-footer-shop" x-ms-format-detection="none"></div>
          <div class="ac-gf-footer-locale">
            <a>Perú</a>
          </div>
          <div class="ac-gf-footer-legal">
            <div class="ac-gf-footer-legal-copyright">Copyright © 2023 EcoGestion S.A.C. Todos los derechos reservados.
            </div>
            <div class="ac-gf-footer-legal-links">
              <a class="ac-gf-footer-legal-link" href="policy.php">Política de Privacidad</a>
              <a class="ac-gf-footer-legal-link" href="terms.php">Terminos de Uso</a>
              <a class="ac-gf-footer-legal-link" href="https://ecoges02.web.app/legal.html">Legal</a>

            </div>
          </div>
        </section>
      </div>
    </footer>
        

      
        <button onclick={topFunction} id="myBtn">
            <img src="assets/css/images/up-arrow.png" alt="alternative"/>
        </button>
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

    <script src="home.js"></script>
</html>
