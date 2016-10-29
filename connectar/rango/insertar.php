<?php 
require_once('conectar.php');

	$nombre =$_POST['nombre'];	
	$entrada =$_POST['entrada'];
	$salida =$_POST['salida'];

	$sql1=" SELECT * FROM rango_citas FROM  nombre='".$nombre."' ";
	$resultado = $conn->query($sql1);
	$fila = mysqli_num_rows($resultado);

		if ($fila==0){
			$sql= " INSERT INTO rango_cita (nombre, entrada, salida) values ('".$nombre."', '".$entrada."','".$salida."')";
			$insert = $conn->query($sql) or die (mysqli_errno());
			echo 1;
		}
	else{
		echo 0;
	}


 ?>