<?php
	require_once('usuarios.php');

$id = $_POST['id'];
$nombres = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$clave = $_POST['clave'];


# Editar los datos de un usuario existente
	$edit_user_data = array(
	    'nombre'=>$nombres,
	    'apellido'=>$apellido,
	    'email'=>$email,
	    'clave'=>$clave);

	$usuario3 = new Usuario();
	$usuario3->get($edit_user_data['email']);
	$usuario3->edit($edit_user_data);
	echo $usuario3->nombre . ' ' . $usuario3->apellido . ' ha sido editado a '.$nombres;
?>