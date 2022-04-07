<?php

require "../../logic/conexion.php";


$objConexion = new mysqli($host,$user,$password,$baseDatos);

if ($objConexion->connect_errno) 
{
  echo "Error de conexion a la Base de datos".$objConexion->connect_error;
  exit();
}

  $sql = "INSERT INTO `clientes`(`documento`, `nombres`, `apellidos`, `correo`, `direccion`, `telefono`, `contraseña`, `estado`) 
  VALUES ('$_REQUEST[doc]','$_REQUEST[nom]','$_REQUEST[ape]','$_REQUEST[cor]','$_REQUEST[dir]','$_REQUEST[tel]','$_REQUEST[con]','$_REQUEST[es]')";
  
  

  if ($objConexion->query($sql)) {
    header('Location:clientes.php?pag=InsertarProveedor&msg=Error');
  }
  else {
    header('Location:clientes.php?pag=InsertarProveedor&msg=Exito');
  }



  //$_SESSION['message'] = 'Task Saved Successfully';
  //$_SESSION['message_type'] = 'success';



?>
