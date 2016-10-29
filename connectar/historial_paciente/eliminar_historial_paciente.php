<?php
	require_once('clase_historial_paciente.php');

	$pk_historial= $_GET['pk_historial'];

	# Eliminar un usuario
	$usuario4 = new Historial_paciente();
	$usuario4->get($pk_historial);
	$usuario4->delete($pk_historial);
	header("location:m_historial_paciente.php");

?>