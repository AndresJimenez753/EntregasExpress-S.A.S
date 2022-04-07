<?php

include("../../logic/conexion.php"); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
  $query = "UPDATE pedidos SET estado = 'Cancelado' WHERE id = $id";
  $result = mysqli_query($objConexion, $query);
  if(!$result) {
    die("Fallo del Query.");
  }

  header('Location: entregas.php');
}

?>