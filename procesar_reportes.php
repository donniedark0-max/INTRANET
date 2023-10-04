<?php

session_start();

  require 'database.php';
  
$message = '';
$idUsuario = $_SESSION['user_id'];

  if (!empty($_POST['nombre']) && !empty($_POST['dni']) && !empty($_POST['numero']) && !empty($_POST['ubicacion']) && !empty($_POST['reporte'])) {
    $sql = "INSERT INTO reportes (nombre, dni, numero, ubicacion, reporte, id_user) VALUES (:nombre, :dni, :numero, :ubicacion, :reporte, :id_user)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':dni', $_POST['dni']);
    $stmt->bindParam(':numero', $_POST['numero']);
    $stmt->bindParam(':ubicacion', $_POST['ubicacion']);
    $stmt->bindParam(':reporte', $_POST['reporte']);
    $stmt->bindParam(':id_user', $idUsuario);
    if ($stmt->execute()) {
      $message = 'Reporte enviada';
    } else {
      $message = 'Disculpe ha ocurrido un error';
    }
  }
?>


<?php

// Check the value of the action input field.
if ($_POST['action'] === 'procesar_reportes.php') {

  // Do something with the form data.

  // Redirect the user back to index.php.
  header('Location: index.php');
  exit;
}

?>