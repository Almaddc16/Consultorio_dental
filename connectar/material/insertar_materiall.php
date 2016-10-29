<?php

	require_once('clase_material.php');



    $codigo = $_POST['codigo'];
    $nom_material = $_POST['nom_material'];
    $descripcion =$_POST['descripcion'];
    $unidades = $_POST['unidades'];
    $costo_caja = $_POST['costo_caja'];
    $costo_unitario = $_POST['costo_unitario'];
    $tope = $_POST['tope'];



	# Crear un nuevo usuario
	$new_user_data = array( 'codigo'=> $codigo,
							'nom_material' => $nom_material,
							'descripcion' => $descripcion,
							'unidades' => $unidades,
							'costo_caja' => $costo_caja,
						'costo_unitario' =>$costo_unitario,
						'tope' => $tope);

	$usuario2 = new Material();
	if($usuario2->set($new_user_data))
	{

if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 10240;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
	{
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagen/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){

					//conexion a la base de datos
			mysql_connect("localhost", "root", "") or die(mysql_error()) ;
			mysql_select_db("consultorio_dental") or die(mysql_error()) ;

			
				#echo "el archivo ha sido movido exitosamente";
				$insertar_imagen=mysql_query("INSERT INTO imagenes_material (ruta, fk_material) values ('".$ruta."', 19)");



				if($insertar_imagen > 0)
				{
			echo "<html>
			<head>
			</head>
			<body>
			<meta http-equiv='REFRESH' content='0 ; url=m_material.php'>
			<script>
				alert('Tarea Guardada Exitosamente!!');
			</script>
			</body>
			</html>
			";
				}

			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes (10MB)";
	}
}

	}

	$usuario2->get($new_user_data['codigo']);
	echo $usuario2->codigo . ' con el nombre de: ' . $usuario2->nom_material . ' ha sido creado<br>';
	header("location:m_material.php");

?>