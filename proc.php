<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />

		<meta name="author" content="Codrops" />

			
	<title></title>
</head>
<body>


<?php

include 'conexion.php';

$q=$_POST["q"];
$con=conexion();

$sql="select * from paciente where nombre LIKE '".$q."%'";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

echo '<center><b>No hay sugerencias</b></center>';

}else{

echo '<center><br>Resultado de la busqueda :</b></center><br/>';

?>


<table class="table table-hover">
<tr> <!-- esto es una fila-->
	<td>Curp</td>
	<td >Nombre(s)</td>
	<td >Apellidos</td>
	<td >Ver</td>
	
</tr>


 <?php
 while($fila = mysql_fetch_array($res)){
 	
 	echo"<tr>";
 		echo"<td >".$fila['curp']."</td>";

 		echo "<td><button class=btn btn-danger> <a style=color:black  href=connectar/paciente/expediente.php?pk_paciente=".$fila['pk_paciente']." "; ?><?php echo"> ".$fila['nombre']."</a> </button></td>";
 		echo "<td><button class=btn btn-danger> <a style=color:black  href=connectar/paciente/expediente.php?pk_paciente=".$fila['pk_paciente']." "; ?><?php echo"> ".$fila['apellidos']."</a> </button></td>";
 		
 		echo "<td> <button class=btn btn-danger><a style=color:black href=connectar/paciente/expediente.php?pk_paciente=".$fila['pk_paciente']." "; ?><?php echo"> Ver </a> </button></td>";
		
	echo"</tr>";
 										}
?>
</table>


	
</body>
</html>

<?php } ?>


