<?php
//conexion a la base de datos
mysql_connect("localhost", "root", "") or die(mysql_error()) ;
mysql_select_db("consultorio_dental") or die(mysql_error()) ;

//vamos a crear nuestra consulta SQL
$consulta = "SELECT imagen FROM img_material";
//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
$resultado= @mysql_query($consulta) or die(mysql_error());

//si el resultado fue exitoso
//obtendremos los datos que ha devuelto la base de datos
//y con un ciclo recorreremos todos los resultados
while ($datos = @mysql_fetch_assoc($resultado) ){
    //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
    $ruta = "imagenes/" . $datos['imagen'];

    //ahora solamente debemos mostrar la imagen
    echo "<img src='$ruta' />"; 


    
}

?>