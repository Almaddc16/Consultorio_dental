<?php
	require_once('clase_servicio.php');

	$nom_servicio= $_POST['nom_servicio'];
	$costo= $_POST['costo'];





	# Crear un nuevo usuario
	$new_user_data = array('nom_servicio' => $nom_servicio,
						'costo' => $costo);

	$usuario2 = new Servicio();
	$usuario2->set($new_user_data);
	$usuario2->get($new_user_data['nom_servicio']);
	echo $usuario2->nom_servicio . ' ' . $usuario2->costo . ' ha sido creado<br>';

?>