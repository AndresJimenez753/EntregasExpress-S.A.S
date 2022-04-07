<?php
session_start();
extract($_REQUEST);
require "conexion.php";


$usu =$_REQUEST['txtUser'];
$login =$_REQUEST['txtPassword'];
$rol =$_REQUEST['txtRol'];

$objConexion=Conectarse();

$mensaje="Usuario o contraseña icorrectos";

if ($rol == "3" ) {
    $sql="SELECT * FROM empleados WHERE documento = '$usu' and Contraseña = '$login' and idRol = '$rol'";
        $resultado=$objConexion->query($sql);
        $existe=$resultado->num_rows;
        if ($existe==1)
        {
        $usuario=$resultado->fetch_object();
        $_SESSION['user']= $usuario->documento;
        header("location: ../roles/admin/index.php?usu=$usu");
        }
        else {
        header("location: ../login.php?men=$mensaje");
        }
}
elseif($rol == "2") {
    $sql="SELECT * FROM empleados WHERE documento = '$usu' and Contraseña = '$login' and idRol = '$rol'";
        $resultado=$objConexion->query($sql);
        $existe=$resultado->num_rows;
        if ($existe==1)
        {
        $usuario=$resultado->fetch_object();
        $_SESSION['user']= $usuario->documento;
        header("location:../roles/mensajero/index.php?usu=$usu");
        }
        else {
        header("location:../login.php?men=$mensaje"); 
        }
}
elseif($rol == "1") {
    $sql="SELECT * FROM clientes WHERE documento = '$usu' and Contraseña = '$login'";
$resultado=$objConexion->query($sql);
$existe=$resultado->num_rows;
if ($existe==1)
{
$usuario=$resultado->fetch_object();
$_SESSION['user']= $usuario->documento;
header("location:../roles/client/index.php?usu=$usu");
}
else {
header("location:../login.php?men=$mensaje"); 
}
}
else {
    header("location:../login.php?men=$mensaje"); 
    }

?>