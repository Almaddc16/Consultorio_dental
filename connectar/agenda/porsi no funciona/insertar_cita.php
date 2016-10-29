<?php 
require_once('clase_cita.php');

	$fk_paciente =$_POST['fk_paciente'];	
	$fecha =$_POST['fecha'];
	$ampm =$_POST['ampm'];
	$h_entrada =$_POST['h_entrada'];
	$min_entrada =$_POST['min_entrada'];
	$h_salida =$_POST['h_salida'];
	$min_salida =$_POST['min_salida'];
	

# Crear un nuevo rol
	$new_user_data = array('fk_paciente' => $fk_paciente,
							'fecha'=>$fecha,
							'ampm'=>$ampm,
							'h_entrada'=>$h_entrada,
							'min_entrada'=>$min_entrada,
							'h_salida'=>$h_salida,
							'min_salida'=>$min_salida,	
						  );

	$agenda = new NuevaCita();
	if($agenda->set($new_user_data))
	{
	echo "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
</head>
	<body>
		<script>
			alert('Datos Guardados Con Éxito');
		</script>
	</body>
	</html>";
	}
	else
	{
	echo "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
</head>
	<body>
		<script>
			alert('Ha Ocurrido un Problema');
		</script>
	</body>
	</html>";
	}
	//$usuario2->get($new_user_data['nombre_modulo']);
	//echo 'El modulo '.$usuario2->nombre_modulo.' ha sido creado<br>';

	//	$sql= " INSERT INTO agenda(fk_paciente, fecha, ampm, h_entrada, min_entrada, h_salida, min_salida) 
		//values ('".$fk_paciente."', '".$fecha."','".$ampm."', '".$fecha."', '".$h_entrada."', '".$min_entrada."', '".$h_salida."', '".$min_salida."')";
		
	//echo "1";
//}	
	
	
	


 ?>
