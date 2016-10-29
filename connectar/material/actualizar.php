<?php 

//conexion a la base de datos
mysql_connect("localhost", "root", "") or die(mysql_error()) ;
mysql_select_db("consultorio_dental") or die(mysql_error()) ;

//comprobamos si ha ocurrido un error.
if (@$_FILES["imagen"]["error"] > 0){
	 echo "
    <meta charset='utf-8' http-equiv='refresh' content = '0 ; url=m_material.php'>
    <script>
      alert('Ocurrio un error');
    </script>
  ";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 1000;

	if (in_array(@$_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
	{
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado)
			{
			    $pk_material =$_POST['pk_material'];
			    $codigo = $_POST['codigo'];
  				  		 $nom_material = $_POST['nom_material'];
   						 $descripcion =$_POST['descripcion'];
   						 $unidades = $_POST['unidades'];
   						 $costo_caja = $_POST['costo_caja'];
   							 $costo_unitario = $_POST['costo_unitario'];
    						 $tope = $_POST['tope'];


				$nombre = $_FILES['imagen']['name'];

			$actualizar = mysql_query("UPDATE material SET codigo = '$codigo', nom_material = '$nom_material', descripcion = '$descripcion', unidades = '$unidades', costo_caja = '$costo_caja', costo_unitario = '$costo_unitario', tope = '$tope', imagen = '$nombre' WHERe `pk_material` = '$pk_material' ") ;

				 if($actualizar){
				 	 echo "
					    <meta charset='utf-8' http-equiv='refresh' content = '0 ; '>
					    <script>
					      alert('El archivo $codigo se subio correctamente');
					    </script>
					  ";
					}else{
						 echo "
					    <meta charset='utf-8' http-equiv='refresh' content = '0 ; '>
					    <script>
					      alert('El archivo $codigo no se se ha subido');
					    </script>
					  ";
					}
			} 
				else 
				{
					 echo "
					    <meta charset='utf-8' http-equiv='refresh' content = '0 ; url=m_material.php'>
					    <script>
					      alert('ocurrido un error al mover el archivo');
					    </script>
					  ";	
				}
		
	} 
	else
	 {
		 echo "
					    <meta charset='utf-8' http-equiv='refresh' content = '0 ; '>
					    <script>
					      alert('archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes');
					    </script>
					  ";	
	}
}

 ?>