<?php

require "../../logic/conexion.php";


$objConexion = new mysqli($host,$user,$password,$baseDatos);

if ($objConexion->connect_errno) 
{
  echo "Error de conexion a la Base de datos".$objConexion->connect_error;
  exit();
}

  $sql = "INSERT INTO `empleados`(`documento`, `nombres`, `apellidos`, `correo`, `direccion`, `telefono`, `contraseña`, `estado`, `idRol`)
  VALUES ('$_REQUEST[doc]','$_REQUEST[nom]','$_REQUEST[ape]','$_REQUEST[cor]','$_REQUEST[dir]','$_REQUEST[tel]','$_REQUEST[con]','$_REQUEST[est]','$_REQUEST[rol]')";

  if ($objConexion->query($sql)) {
    header('Location:mensajeros.php?pag=InsertarProveedor&msg=Exito');
  }
  else {
    header('Location:mensajeros.php?pag=InsertarProveedor&msg=Error');
  }



  //$_SESSION['message'] = 'Task Saved Successfully';
  //$_SESSION['message_type'] = 'success';



?>
