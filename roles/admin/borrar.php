<?php

include("../../logic/conexion.php"); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
  $query = "UPDATE clientes SET estado = 'Deshabilitado' WHERE idCliente = $id";
  $result = mysqli_query($objConexion, $query);
  if(!$result) {
    die("Fallo del Query.");
  }

  header('Location: clientes.php');
}

?>