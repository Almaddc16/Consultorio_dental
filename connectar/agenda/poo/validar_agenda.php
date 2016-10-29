<?php

    require_once('../../conexion.php');
   $pk_paciente = $_POST['fk_paciente'];
    $fecha = $_POST['fecha'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];

$sql = "SELECT * FROM agenda WHERE fk_paciente='$pk_paciente'";
$result = mysql_query($sql) or die("$text_noquery");
//if (!empty($codigo)) {
if (mysql_num_rows($result) != 0){
print ("error, codigo ya registrado");
?>
<br>
<a href="javascript:history.go(-1)">volver</a>
<?php


} else {

//phpinfo ();
//if ($_SERVER["REQUEST_METHOD"]=="POST"){ 
//print ($_SERVER["REQUEST_METHOD"]);
$connection = mysql_connect("$localhost","$root","") or die ("Cannot connect to server.");
$db = mysql_select_db("$consultorio_dental", $connection) or die ("Could not select database.");
$sql = "INSERT INTO agenda (fk_paciente, fecha, entrada, salida) VALUES ('$fk_paciente','$fecha', '$entrada', '$salida')";


$sql_result = mysql_query($sql) or die("$text_noquery");


$last_id=mysql_insert_id(); 
} 
?>