<!doctype html lang="es">
<html>
<head>
	<title>Paciente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />

	</head>
	<body>
<div class="container">
			
<div class="jumbotron">
  
<h3>Consultorio Dental</h3>
<p><a class="btn btn-primary btn-lg glyphicon glyphicon-th" href="../../index.html" role="button"> Inicio</a></p>
</div>

<?php
	require_once('clase_cita.php');

		$fk_paciente =$_POST['fk_paciente'];	
	$fecha =$_POST['fecha'];
	$ampm =$_POST['ampm'];
	$h_entrada =$_POST['h_entrada'];
	$min_entrada =$_POST['min_entrada'];
	$h_salida =$_POST['h_salida'];
	$min_salida =$_POST['min_salida'];

	





	# Crear un nuevo usuario
	$new_user_data = array('fk_paciente' => $fk_paciente,
							'fecha'=>$fecha,
							'ampm'=>$ampm,
							'h_entrada'=>$h_entrada,
							'min_entrada'=>$min_entrada,
							'h_salida'=>$h_salida,
							'min_salida'=>$min_salida,	
						);
	

	$usuario2 = new NuevaCita();
	$usuario2->set($new_user_data);
	$usuario2->get($new_user_data['fk_paciente']);
	 echo  $usuario2->fk_paciente . ' ' . $usuario2->fecha . ' <div class="container"> ha sido creado<br> 
	<a  href="../abono/agenda_cita/cita.php"><input type="submit" class="btn btn-primary btn-lg glyphicon glyphicon-th" value="Crear cita"></a> <br>
	<a href="../historial_paciente/for_consulta.php"><input type="submit" class="btn btn-primary btn-lg glyphicon glyphicon-th" value="consulta"></a>  </div>
	';

?>
</div>
</html>
