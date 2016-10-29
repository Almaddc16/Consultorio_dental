<?php
	require_once('clase_servicio.php');

	$nom_servicio= $_GET['nom_servicio'];

	# Eliminar un usuario
	$usuario4 = new Servicio();
	$usuario4->get($nom_servicio);
	$usuario4->delete($nom_servicio);
	header("location:m_servicio.php");


?>