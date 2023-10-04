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

        <link rel="stylesheet" href="assets/css/policy.css">

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
 <section id="banner" class="pt-20">
      <div class="interior">

<h1 class="tit1 sm:text-sm md:text-base xl:text-xl lg:text-lg: 2xl:text-2xl ">Política de privacidad de EcoGestion</h1>
  
 <h3 class="tit3">Actualización: 01 de junio de 2023</h3>
 <br/>
<p class="uno sm:text-sm md:text-base xl:text-xl lg:text-lg: 2xl:text-2xl">En la Política de privacidad de Ecogestion, se describe la manera en que se recopila, utiliza y comparte sus datos personales.</p>
<p class="uno sm:text-sm md:text-base xl:text-xl lg:text-lg: 2xl:text-2xl">Tendrá la oportunidad de revisar la información específica del producto antes de utilizar estas funcionalidades. También puede ver esta información en cualquier momento en la configuración relacionada con esas funcionalidades o en línea</p>
<p class="uno sm:text-sm md:text-base xl:text-xl lg:text-lg: 2xl:text-2xl">Puedes familiarizarte con nuestras prácticas de privacidad, a las que podrás acceder mediante los títulos que se encuentran a continuación. Si tienes alguna pregunta,&nbsp;<a href="https://ecoges02.web.app#cta" class="linka">comuníquese con nosotros</a>.</p>
<p class="uno sm:text-sm md:text-base xl:text-xl lg:text-lg: 2xl:text-2xl "><a href="404.html" target="_blank" class="linka">Descargue una copia de esta Política de privacidad</a><br>
&nbsp;<br>
</p>
      </div>
</section>
<div class ="nombrar">
<h4 class="pb-3">Tus derechos de privacidad en EcoGestion:   </h4>
  <ul>
    <li><strong>Acceso:</strong> Solicitar información sobre los datos personales que hemos recopilado y cómo los utilizamos.</li>
    <li><strong>Rectificación:</strong> Corregir o actualizar cualquier dato personal inexacto o incompleto que tengamos.</li>
    <li><strong>Supresión:</strong> Solicitar la eliminación de tus datos personales de nuestros registros, siempre que sea legalmente posible.</li>
    <li><strong>Restricción de procesamiento:</strong> Solicitar la restricción del procesamiento de tus datos personales en ciertas circunstancias.</li>
    <li><strong>Portabilidad:</strong> Solicitar una copia electrónica de tus datos personales en un formato estructurado y de uso común.</li>
    <li><strong>Oposición:</strong> Oponerte al procesamiento de tus datos personales en ciertas circunstancias, incluido el marketing directo.</li>
    <li><strong>Retirada del consentimiento:</strong> Retirar tu consentimiento para el procesamiento de tus datos personales cuando el procesamiento se base en el consentimiento.</li>
  </ul>
  <br/>
  <h4 class="pb-3">Datos personales que EcoGestion recopila de ti:</h4>
  <ul>
    <li><strong>Información de contacto:</strong> Nombre, dirección de correo electrónico, número de teléfono.</li>
    <li><strong>Información de ubicación:</strong> Ubicación geográfica proporcionada por ti o tu dispositivo.</li>
    <li><strong>Información del formulario de reporte:</strong> Datos proporcionados en el formulario de reporte de basura acumulada, incluyendo descripción, imágenes y ubicación específica.</li>
  </ul>
  <br/>
  <h4 class="pb-3">Protección de los datos personales en EcoGestion:</h4>
  <ul>
    <li>En EcoGestion tomamos medidas para proteger tus datos personales y mantener su confidencialidad. Implementamos medidas de seguridad técnicas, administrativas y físicas para evitar el acceso no autorizado, el uso indebido, la divulgación o la alteración de tus datos personales.</li>
  </ul>
  <br/>
  <h4 class="pb-3">El compromiso de la empresa con tu privacidad:</h4>
  <ul>
    <li>En EcoGestion nos comprometemos a utilizar tus datos personales de manera responsable y únicamente con el propósito de brindarte nuestros servicios. No compartiremos tus datos personales con terceros, a menos que sea necesario para cumplir con nuestras obligaciones legales o contar con tu consentimiento expreso.</li>
  </ul>
  <br/>
  <br/>
    <p class="font-extrabold pb-20">Si tienes alguna pregunta o inquietud relacionada con nuestra Política de privacidad, no dudes en contactarnos. Estamos aquí para ayudarte y brindarte la información que necesites.</p>

</div>


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