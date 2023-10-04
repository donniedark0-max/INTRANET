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

$message = '';
$idUsuario = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servicio = $_POST['servicio'];

    if ($servicio === 'limpieza') {
      if (!empty($_POST['nombre_empresa']) && !empty($_POST['ubicacion']) && !empty($_POST['tipo_residuo']) && !empty($_POST['mensaje']) && !empty($_POST['fecha'])) {
        $sql = "INSERT INTO limpieza_empresas (nombre_empresa, ubicacion, tipo_residuo, mensaje, fecha, id_user)
                VALUES (:nombre_empresa, :ubicacion, :tipo_residuo, :mensaje, :fecha, :id_user)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_empresa', $_POST['nombre_empresa']);
        $stmt->bindParam(':ubicacion', $_POST['ubicacion']);
        $stmt->bindParam(':tipo_residuo', $_POST['tipo_residuo']);
        $stmt->bindParam(':mensaje', $_POST['mensaje']);
        $stmt->bindParam(':fecha', $_POST['fecha']);
        $stmt->bindParam(':id_user', $idUsuario);
        $stmt->execute();
      }
    } elseif ($servicio === 'mercadeo') {
      if (!empty($_POST['tipo_residuo']) && !empty($_POST['ubicacion']) && !empty($_POST['mensaje']) && !empty($_POST['fecha'])) {
        $sql = "INSERT INTO mercadeo_residuos (tipo_residuo, ubicacion, mensaje, fecha, id_user) 
                VALUES (:tipo_residuo, :ubicacion, :mensaje, :fecha, :id_user)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tipo_residuo', $_POST['tipo_residuo']);
        $stmt->bindParam(':ubicacion', $_POST['ubicacion']);
        $stmt->bindParam(':mensaje', $_POST['mensaje']);
        $stmt->bindParam(':fecha', $_POST['fecha']);
        $stmt->bindParam(':id_user', $idUsuario);
        $stmt->execute();
      }
    } elseif ($servicio === 'recoleccion') {
      if (!empty($_POST['nombre_empresa']) && !empty($_POST['ubicacion']) && !empty($_POST['tipo_residuo']) && !empty($_POST['mensaje']) && !empty($_POST['fecha'])) {
        $sql = "INSERT INTO recoleccion_residuos (nombre_empresa, ubicacion, tipo_residuo_recolectar, mensaje, fecha, id_user)
                 VALUES (:nombre_empresa, :ubicacion, :tipo_residuo, :mensaje, :fecha, :id_user)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_empresa', $_POST['nombre_empresa']);
        $stmt->bindParam(':ubicacion', $_POST['ubicacion']);
        $stmt->bindParam(':tipo_residuo', $_POST['tipo_residuo']);
        $stmt->bindParam(':mensaje', $_POST['mensaje']);
        $stmt->bindParam(':fecha', $_POST['fecha']);
        $stmt->bindParam(':id_user', $idUsuario);
        $stmt->execute();
      }
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
                    href="index.php#contact">Reporte</a>
            </div>
            <div class="flex items-center justify-end gap-3">
               
                <a class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                    href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</header>


 <div id="contact" class="form-2 justify-center">
<form method="POST" action="servicios.php">
    <div class="pb-10" >
    <label for="servicio" class="block mb-3  font-medium text-gray-900 dark:text-white text-4xl">>Seleccione el servicio:</label>
    <select name="servicio" id="servicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="limpieza">Limpieza de empresas</option>
        <option value="mercadeo">Mercadeo de Residuos Sólidos Reutilizables</option>
        <option value="recoleccion">Recolección de residuos Biocontaminantes</option>
    </select>
</div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servicio = $_POST['servicio'];
        
        if ($servicio === 'limpieza') {
            echo '
            <div class="form-group pt-5">
            <label for="nombre_empresa"></label>
            <input type="text"  class="form-control-input text-xl" placeholder="Nombre de la empresa" name="nombre_empresa" id="nombre_empresa" required>
            </div>

            <div class="form-group pt-5">
            <label for="ubicacion"></label>
            <input type="text"  placeholder="Ubicación" class="form-control-input text-xl" name="ubicacion" id="ubicacion" required>
            </div>

            <div class="form-group pt-5">
            <label for="tipo_residuo"></label>
            <input type="text"  class="form-control-input text-xl" placeholder="Tipo de residuo a limpiar" name="tipo_residuo" id="tipo_residuo" required>
            </div>

            <div class="form-group pt-5">
            <label for="mensaje"></label>
            <textarea name="mensaje" placeholder="Mensaje" class="form-control-input text-xl" id="mensaje" required></textarea>
            </div>

            <div class="form-group pt-5">
            <label for="fecha_servicio"></label>
            <input type="date" placeholder="Fecha del servicio" class="form-control-input text-xl justify-center" name="fecha" id="fecha" required>
            </div>
            ';
        } elseif ($servicio === 'mercadeo') {
            echo '
             <div class="form-group pt-5">
            <label for="tipo_residuo"></label>
            <input type="text" placeholder="Tipo de residuo general a comprar" class="form-control-input text-xl" name="tipo_residuo" id="tipo_residuo" required>
            </div>

             <div class="form-group pt-5">
            <label for="ubicacion"></label>
            <input type="text" placeholder="Ubicación" class="form-control-input text-xl" name="ubicacion" id="ubicacion" required>
            </div>

             <div class="form-group pt-5">
            <label for="mensaje"></label>
            <textarea name="mensaje" placeholder="Mensaje" class="form-control-input text-xl" id="mensaje" required></textarea>
            </div>

             <div class="form-group pt-5">
             <label for="fecha_servicio"></label>
            <input type="date" class="form-control-input text-xl" name="fecha" id="fecha" required>
            </div>
            ';
        } elseif ($servicio === 'recoleccion') {
            echo '
             <div class="form-group pt-5">
            <label for="nombre_empresa"></label>
            <input type="text" placeholder="Nombre de la empresa" class="form-control-input text-xl" name="nombre_empresa" id="nombre_empresa" required>
            </div>

             <div class="form-group pt-5">
            <label for="ubicacion"></label>
            <input type="text" placeholder="Ubicación" class="form-control-input text-xl" name="ubicacion" id="ubicacion" required>
            </div>

             <div class="form-group pt-5">
            <label for="tipo_residuo"></label>
            <input type="text" placeholder="Tipo de residuo a recolectar" class="form-control-input text-xl" name="tipo_residuo" id="tipo_residuo" required>
            </div>            

             <div class="form-group pt-5">
            <label for="mensaje"></label>
            <textarea placeholder="Mensaje" class="form-control-input text-xl" name="mensaje" id="mensaje" required></textarea>
           </div>             

             <div class="form-group pt-5">
            <label for="fecha_servicio"></label>
            <input type="date" class="form-control-input text-xl" name="fecha" id="fecha" required>
            </div>    
            ';
        }
    }
    ?>
        <input type="submit"  class="bg-black text-white font-montserrat py-2 px-8 text-2xl rounded-full hover:bg-gray-700 transition-all duration-300" style="box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.6);" value="Enviar">
          
</form>


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
