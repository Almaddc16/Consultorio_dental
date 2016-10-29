<?php

//conexion a la base de datos
mysql_connect("localhost", "root", "") or die(mysql_error()) ;
mysql_select_db("consultorio_dental") or die(mysql_error()) ;


//comprobamos si ha ocurrido un error.
if (@$_FILES["imagen"]["error"] > 0){
    echo "ha ocurrido un error";
} else {
    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
    //y que el tamano del archivo no exceda los 100kb
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 1000;

    if (in_array(@$_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
        //esta es la ruta donde copiaremos la imagen
        //recuerden que deben crear un directorio con este mismo nombre
        //en el mismo lugar donde se encuentra el archivo subir.php
    
        $ruta = "imagenes/" . $_FILES['imagen']['name'];
        //comprobamos si este archivo existe para no volverlo a copiar.
        //pero si quieren pueden obviar esto si no es necesario.
        //o pueden darle otro nombre para que no sobreescriba el actual.
        if (!file_exists($ruta)){
            //aqui movemos el archivo desde la ruta temporal a nuestra ruta
            //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
            //almacenara true o false
            $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
            if ($resultado)
            {
                        $buscar_ruta= mysql_query("SELECT imagen FROM material WHERE pk_material='".$_REQUEST['pk_material']."'");
                        $renglon_ruta = mysql_fetch_assoc($buscar_ruta);

                        unlink($renglon_ruta['imagen']);
                
                        $pk_material = $_REQUEST['pk_material'];
                        $nombre = $_FILES['imagen']['name'];
                        $codigo = $_POST['codigo'];
                        $nom_material = $_POST['nom_material'];
                        $descripcion =$_POST['descripcion'];
                        $unidades = $_POST['unidades'];
                        $costo_caja = $_POST['costo_caja'];
                        $costo_unitario = $_POST['costo_unitario'];
                        $tope = $_POST['tope'];

                
                @mysql_query("UPDATE material SET codigo = '$codigo', nom_material = '$nom_material', descripcion = '$descripcion', 
                    unidades = '$unidades', costo_caja = '$costo_caja', costo_unitario = '$costo_unitario', 
                    tope = '$tope', imagen = '$ruta' WHERe `pk_material` = '$pk_material' ");
              echo "
                <meta charset='utf-8' http-equiv='refresh' content = '0 ; '>
                        <script>
                          alert(' El archivo ha sido movido exitosamente');
                        </script> ";
               	header("location:m_material.php");
            } else {
                echo "ocurrio un error al mover el archivo.";
            }
        } else {
            echo $_FILES['imagen']['name'] . ", este archivo existe";
            

        }
    } else {
        echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
    }
}

?>