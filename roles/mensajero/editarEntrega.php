<?php
include("../../logic/conexion.php");
$id = $_GET['id'];
$est = $_POST['est'];

$query = "UPDATE `pedidos` SET `estado`='$est' WHERE `id`='$id';";

  mysqli_query($objConexion, $query);

  header('Location: entregas.php');





?>