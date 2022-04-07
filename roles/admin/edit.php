<?php
include("../../logic/conexion.php");
$id = $_GET['id'];
$documento= $_POST['doc'];
$nombres= $_POST['nom'];
$apellidos= $_POST['ape'];
$correo= $_POST['cor'];
$direccion= $_POST['dir'];
$telefono= $_POST['tel'];
$contraseña= $_POST['con'];



  $query = "UPDATE clientes SET documento='$documento',nombres='$nombres',apellidos='$apellidos',correo='$correo',direccion='$direccion',telefono='$telefono',contraseña='$contraseña' WHERE idCliente=$id";
  
  mysqli_query($objConexion, $query);

  header('Location: clientes.php');





?>