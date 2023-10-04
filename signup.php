<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado satisfactoramente';
    } else {
      $message = 'Disculpe ha ocurrido un error creando su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="assets/css/style.css">
     
  </head>
  <body>

   

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
 <div class="w-96 rounded-full sm:w-auto md:w-full">
     <h1 class="logo  text-center  pb-5">
            ECO
          </h1>
         

    <form id="registroForm" class="bg-white  px-8 pt-6 pb-8 mb-4 lg:w-96 rounded-3xl sm:w-96 md:w-full mx-auto my-auto"action="signup.php" method="POST">
       <div class="mb-4 ">
              <div class="text-center">
              <p class="text-black pt-3 pb-8 text-center  sm:text-xl"> Ayúdanos a crear un mundo sin residuos </p>
              </div>
      <input class="shadow appearance-none rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-center" name="email" id="email" type="text" placeholder="Ingresa tu email">
        </div>
        <div class="mb-4">
      <input class="shadow appearance-none  rounded-lg w-full py-2 px-3  text-gray-700 leading-tight text-sm focus:outline-none focus:shadow-outline font-bold mb-2 pt-3 text-center" id="password" name="password" type="password" placeholder="Ingresa tu contraseña">
    </div>
    <div class="mb-4">
      <input class="w-full shadow appearance-none rounded-lg py-2 px-3 text-gray-700 leading-tight text-sm  font-bold mb-2 pt-3 text-center focus:outline-none focus:shadow-outline" id="passwordc" name="confirm_password" type="password" placeholder="Repite tu contraseña">
    </div>
     <div class="flex  items-center justify-center">
      <input class="bg-blue-500 hover:bg-indigo-950 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline cursor-pointer"type="submit" value="Registrarte">
     </div>
    </form>
     <div class="flex  items-center justify-center">
      <p className="my-4 text-sm flex justify-between px-3 text-black">
        ¿Ya tiene cuenta?
      <a class="text-blue-700 hover:text-blue-900 no-underline" href="login.php"> Inicia sesión</a></p>
     </div>
<script>
  document.getElementById("registroForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que se envíe el formulario por defecto

    var passwordInput = document.getElementById("password");
    var emailInput = document.getElementById("email");
    var passwordConfirm = document.getElementById("passwordc");
    // Verifica que los campos no estén vacíos
    if (passwordInput.value.trim() === "" || emailInput.value.trim() === "" || passwordConfirm.value.trim() === "" ) {
       Swal.fire({
        title: 'Error',
        text: 'Complete todos los campos.',
        imageUrl: 'https://media2.giphy.com/media/yALcFbrKshfoY/giphy.gif?cid=ecf05e47i1bensjtja6trg6xg7gkgs11mhwp61cgfvf6351c&ep=v1_gifs_search&rid=giphy.gif&ct=g',
        imageWidth: 300,
        imageHeight: 300,
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
        imageUrl: 'https://media1.giphy.com/media/JyDMX1pVgdHl6/giphy.gif?cid=ecf05e47g6fcyydv8crpsrjh4sokdo3mfxz1cmsnve9dphuu&ep=v1_gifs_related&rid=giphy.gif&ct=g',
        imageWidth: 500,
        imageHeight: 250,
        imageAlt: 'rest',
        })
      return;
    }
 if (passwordInput.value !== passwordConfirm.value) {
      Swal.fire('Las contaseñas no coinciden')

      return;
    }
    // Si se pasa la validación, puedes enviar el formulario
    this.submit();
  });
</script>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
