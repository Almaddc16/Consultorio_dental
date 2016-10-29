<?php
	require_once('clase_agenda.php');

    $pk_paciente = $_POST['fk_paciente'];
    $fecha = $_POST['fecha'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    #$fecha = $_POST['fecha'];
 



	# Crear un nuevo usuario
	$new_user_data = array( 'fk_paciente'=> $pk_paciente,
							'fecha' => $fecha,
							'entrada' => $entrada,
							'salida' => $salida
						   );

	$usuario2 = new Agenda();
	if($usuario2->set($new_user_data))
	{
		echo  ' Se abonaron:  '.$fecha. ' al paciente '.$pk_paciente. '<br>';
		//header("location:for_abono.php");
	}
	else
	{
		echo 'no';
	}
	#$usuario2->get($new_user_data['fecha']);
	

?>