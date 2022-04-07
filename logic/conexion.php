<?php
//Variables parametros conexión servidor y base de datos
$host="localhost";
$user="root";
$password="";
$baseDatos="entregasexpress";

//Creamos el objeto conexión utilizando la extensión mysqli
$objConexion = new mysqli($host,$user,$password,$baseDatos);

//Verificamos la conexión
if ($objConexion->connect_errno)
{
	echo "Error de Conexión a la Base de Datos".$objConexion->connect_error;
	exit();
}


function Conectarse()
{
	$objConexion = new mysqli("localhost","root","","entregasexpress");
	if ($objConexion->connect_errno)
	{
		echo "Error de conexion a la Base de Datos".$objConexion->connect_error;
		exit();
	}
	else {
		return $objConexion;
	}
}
?>

