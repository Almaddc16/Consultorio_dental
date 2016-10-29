<?php 
require_once('conectar.php');

$fecha = $_POST['fecha'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];

$sql = "INSERT INTO rango_cita (fecha, entrada, salida) VALUES ('".$fecha."', '".$entrada."', '".$salida."')";


?>