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

 <?php if(!empty($user)): ?>

    <?php
    include("include/head.php");

    include("include/fondo.php");

    include("include/menu.php");

    include("trabajador/txttrabajadores.php");

    include("trabajador/tbtrabajadores.php");
?>
 <?php else: header('location:index.php'); ?>
      
    <?php endif; ?>
