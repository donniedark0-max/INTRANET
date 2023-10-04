<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /INTRANET');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_usuario, email, password, privilegio FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id_usuario'];
     $privilege = $results['privilegio'];
    if ($privilege == 1) {
      header("Location: /index1.php");
    } else {
      header("Location: /index.php?privilege=0");
    }
  } else {
    $message = 'Las credenciales no coinciden';
  }

  }

  

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
 <div class="w-96 rounded-full sm:w-auto md:w-full">
    <h1 class="logo  text-center  pb-5">ECO</h1>
   

    <form id="loginForm" class="bg-white  px-8 pt-6 pb-8 mb-4 lg:w-96 rounded-3xl sm:w-96 md:w-full mx-auto my-auto" action="login.php" method="POST">
      <div class="mb-4 ">
              <div class="text-center">
              <p class="text-black pt-3 pb-8 text-center  sm:text-xl"> Ayúdanos a crear un mundo sin residuos </p>
              </div>
      <input class="shadow appearance-none rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-center" id="email" name="email" type="text" placeholder="Ingresa tu email">
      </div>
       <div class="mb-4">
      <input class="shadow appearance-none  rounded-lg w-full py-2 px-3  text-gray-700 leading-tight text-sm focus:outline-none focus:shadow-outline font-bold mb-2 pt-3 text-center" id="password" name="password" type="password" placeholder="Ingresa tu contraseña">
      </div>
       <div class="flex  items-center justify-center">
      <input class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-3xl focus:outline-none focus:shadow-outline flex  mx-auto cursor-pointer" type="submit" value="Iniciar sesión">
      </div>
    </form>
 <div class="flex  items-center justify-center">
  <p className="my-4 text-sm flex justify-between px-3 text-black w-96 mx-auto my-auto">
        ¿No tiene una cuenta?
    <span><a class="text-blue-700 hover:text-blue-900 no-underline" href="signup.php">Regístrate</a></span>
 </div>
    </div>


    <script>
  document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que se envíe el formulario por defecto

    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");

    // Verifica que los campos no estén vacíos
    if (emailInput.value.trim() === "" || passwordInput.value.trim() === "") {
      Swal.fire({
        title: 'Error',
        text: 'Complete todos los campos.',
        imageUrl: 'https://media4.giphy.com/media/cgW5iwX0e37qg/giphy.gif?cid=ecf05e47d86fp2x24436016sxy84imioejrxpp25g2loayan&ep=v1_gifs_search&rid=giphy.gif&ct=g',
        imageWidth: 500,
        imageHeight: 250,
        imageAlt: 'rest',
        })
      return;
    }

    // Verifica que el campo de correo electrónico tenga un formato válido
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
       Swal.fire({
        title: 'Por favor',
        text: 'Ingrese un email valido.',
        imageUrl: 'https://media2.giphy.com/media/dFtUjX7shZqvK/giphy.gif?cid=ecf05e47i9yvq3v4bzxcpf8xdj5xjvwx7bsn244l6pfpfmvf&ep=v1_gifs_search&rid=giphy.gif&ct=g',
        imageWidth: 500,
        imageHeight: 300,
        imageAlt: 'rest',
        })
      return;
    }

    // Si se pasa la validación, puedes enviar el formulario
    this.submit();
  });
</script>





  </body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
