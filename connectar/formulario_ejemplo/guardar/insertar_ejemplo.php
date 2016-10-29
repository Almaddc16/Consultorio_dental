<?php
	require_once('clase_ejemplo.php');

	$nombre= $_POST['nombre'];
	$domicilio = $_POST['domicilio'];

	# Crear un nuevo registro
	$arreglo = array('nombre' => $nombre ,'domicilio' => $domicilio);

	$instancia = new Clase();
	if($instancia->set($arreglo))
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
?>