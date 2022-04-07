<?php

include("../../logic/conexion.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
  $query = "UPDATE empleados SET estado = 'Deshabilitado' WHERE idEmpleado = $id";
  $result = mysqli_query($objConexion, $query);
  if(!$result) {
    die("Fallo del Query.");
  }

  header('Location: mensajeros.php');
}

?>