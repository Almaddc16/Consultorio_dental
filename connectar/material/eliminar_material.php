<?php
	require_once('clase_material.php');

	$codigo= $_GET['codigo'];

	# Eliminar un usuario
	$usuario4 = new Material();
	$usuario4->get($codigo);
	$usuario4->delete($codigo);
	header("location:m_material.php");

?>