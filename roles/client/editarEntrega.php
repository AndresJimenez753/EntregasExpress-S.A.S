<?php
include("../../logic/conexion.php");
$id = $_GET['id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$dir = $_POST['dir'];
$dir2 = $_POST['dir2'];
$desc = $_POST['desc'];
$client = $_POST['client'];
$tel = $_POST['tel'];
$pago = $_POST['pago'];
$idCliente = $_POST['idCliente'];
$mensajero = $_POST['mensajero'];
$est = $_POST['est'];

  $query = "UPDATE `pedidos` SET `Fecha`='$fecha',`Hora`='$hora',`DireccionRecogida`='$dir',`DireccionEntrega`='$dir2',`Descripcion`='$desc',`nombreDestinatario`='$client',`telefonoDestinatario`='$tel',`valorEnvio`='$pago',`estado`='$est',`idCliente`='$idCliente',`idEmpleado`='$mensajero' WHERE `id`='$id';";
  
  mysqli_query($objConexion, $query);

  header('Location: entregas.php');





?>