<!doctype html lang="es">
<html>
<head>
	<title>Paciente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />

	</head>
	<body>
<DIV class="container">
			
<div class="page-header">
<p><a class="btn btn-primary btn-lg glyphicon glyphicon-th" href="../../index.html" role="button"> Inicio</a></p>
  <h1><small class="btn-lg glyphicon glyphicon-user"></small> Paciente </h1>




<?php
	require_once('clase_paciente.php');

	$nombre= $_POST['nombre'];
	$apellidos= $_POST['apellidos'];
	$curp=$_POST['curp'];
	$edad= $_POST['edad'];
	$fecha_nac= $_POST['fecha_nac'];
	$sexo= $_POST['sexo'];
	$enfermedades_cronicas= $_POST['enfermedades_cronicas'];
	$alergias= $_POST['alergias'];
	$localidad_origen= $_POST['localidad_origen'];
	$direccion= $_POST['direccion'];
	$telefono= $_POST['telefono'];
	





	# Crear un nuevo usuario
	$new_user_data = array('nombre' => $nombre,
						'apellidos' => $apellidos,
						'curp' => $curp,
						'edad' => $edad,
						'fecha_nac' => $fecha_nac,
						'enfermedades_cronicas' => $enfermedades_cronicas,
						'sexo' => $sexo,
						'alergias' => $alergias,
						'localidad_origen' => $localidad_origen,
						'direccion' => $direccion,
						'telefono' => $telefono,
						);
	

	$usuario2 = new Paciente();
	$usuario2->set($new_user_data);
	$usuario2->get($new_user_data['curp']);
	 echo  $usuario2->nombre . ' ' . $usuario2->apellidos . ' Se a añadido a la base de datos<br> 
';

?>
</div>
</DIV>
</html>
