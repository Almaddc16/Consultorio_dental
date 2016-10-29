<?php
	require_once('clase_paciente.php');

	$pk_paciente=$_POST['pk_paciente'];
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


# Editar los datos de un usuario existente
	$new_user_data = array('pk_paciente'=>$pk_paciente,
						'nombre' => $nombre,
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
	$usuario2->edit($new_user_data);
	//$usuario2->get($new_user_data['curp']);
	//echo $usuario3->nombre . ' ' . $usuario3->apellido . ' ha sido editado a '.$nombres;
    
               	header("location:expediente.php?pk_paciente=$pk_paciente");
		
?>
<form action="index.php" enctype="multipart/form-data">

	<br>
	<br>

<input type="submit" name="boton" value="Regresar">

</form>