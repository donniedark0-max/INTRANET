<?php
require 'database.php';



 if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_usuario, nombre, password FROM users WHERE id_usuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<div class="treportef">
            <p>Reportes</p> 
        </div>
        <div class="treporte">
            <p>Reportes</p> 
        </div>

          <?php if(!empty($user)): ?>
           <div class="info">
            <p style="margin-right: 30px; "> Bienvenido <?= $user['nombre']; ?></p>
             <?php if ($user['id_usuario'] == 17): ?>
            <div class="foto">
                <img src="assets/css/images/michael.jpeg" alt="Foto de perfil de Admin 1">
            </div>
        <?php elseif ($user['id_usuario'] == 18): ?>
            <div class="foto">
                <img src="assets/css/images/juan.jpg" alt="Foto de perfil de Admin 2">
            </div>
        <?php elseif ($user['id_usuario'] == 19): ?>
            <div class="foto">
                <img src="assets/css/images/cesar.jpeg" alt="Foto de perfil de Admin 2">
            </div>
        <?php elseif ($user['id_usuario'] == 20): ?>
            <div class="foto">
                <img src="assets/css/images/edson.jpeg" alt="Foto de perfil de Admin 2">
            </div>        
        <?php else: ?>
            <div class="foto">
                <img src="assets/css/images/usuario.svg" alt="Foto de perfil por defecto">
            </div>
        <?php endif; ?>
           
                </div>
            <?php else: ?>
               <p>Hola, usuario</p> 
            
            
                <?php endif; ?>
        </div>