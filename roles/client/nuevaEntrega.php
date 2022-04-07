<?php

require "../../logic/conexion.php";


$objConexion = new mysqli($host,$user,$password,$baseDatos);

if ($objConexion->connect_errno) 
{
  echo "Error de conexion a la Base de datos".$objConexion->connect_error;
  exit();
}

  $sql = "INSERT INTO `pedidos` (`Fecha`, `Hora`, `DireccionRecogida`, `DireccionEntrega`, `Descripcion`, `nombreDestinatario`, `telefonoDestinatario`, `valorEnvio`, `estado`, `idCliente`, `idEmpleado`) 
  VALUES ('$_REQUEST[fecha]','$_REQUEST[hora]','$_REQUEST[dir]','$_REQUEST[dir2]','$_REQUEST[desc]','$_REQUEST[client]','$_REQUEST[tel]','$_REQUEST[pago]','$_REQUEST[est]','$_REQUEST[idCliente]','$_REQUEST[mensajero]')";
  
  

  if ($objConexion->query($sql)) {
    header('Location:entregas.php?pag=InsertarProveedor&msg=Error');
  }
  else {
    header('Location:entregas.php?pag=InsertarProveedor&msg=Exito');
  }



  //$_SESSION['message'] = 'Task Saved Successfully';
  //$_SESSION['message_type'] = 'success';



?>
