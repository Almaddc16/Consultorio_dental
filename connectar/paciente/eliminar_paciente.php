<?php
	require_once('../paciente/clase_paciente.php');

	$curp= $_GET['curp'];

	# Eliminar un usuario
	$usuario4 = new Paciente();
	$usuario4->get($curp);
	$usuario4->delete($curp);
	header("location:m_paciente.php");

?>