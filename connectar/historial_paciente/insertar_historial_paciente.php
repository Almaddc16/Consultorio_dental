<?php
	require_once('clase_historial_paciente.php');



    $fk_paciente = $_POST['fk_paciente'];
    $sintomas = $_POST['sintomas'];
    $receta = $_POST['receta'];
    $foto_diagnostico = $_POST['foto_diagnostico'];
    #$fecha = $_POST['fecha'];
 



	# Crear un nuevo usuario
	$new_user_data = array(
						'fk_paciente'=> $fk_paciente,
						'sintomas' => $sintomas,
						'receta' => $receta,
						'foto_diagnostico' =>$foto_diagnostico
						   );

	$usuario2 = new Historial_paciente();
	if($usuario2->set($new_user_data))
	{
		#echo  ' Se abonaron:  '.$abono. ' al paciente '.$fk_paciente. '<br>';
		echo "se inserto con exito";
		header("location:../paciente/expediente.php?pk_paciente=$fk_paciente");

		//header("location:for_consulta.php");
	}
	else
	{
		echo 'no';
		#header("location:for_consulta.php");
	}
	#$usuario2->get($new_user_data['fecha']);
	

?>