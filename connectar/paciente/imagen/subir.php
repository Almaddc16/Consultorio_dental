<?php
/**
 *
 *  http://casamadrugada.net/tutoriales/php/como-almacenar-archivos-imagenes-en-mysql-utilizando-php/
 *
 *  @author     Welling Guzman
 *  @copyright  (c) 2012 - Welling Guzman
 */

//conexion a la base de datos
require 'conexion.php';
 
//comprobamos si ha ocurrido un error.
if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
    echo "ha ocurrido un error";
} else {
    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
    //y que el tamano del archivo no exceda los 16mb
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384; //16mb es el limite de medium blob
     
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
     
        //este es el archivo temporal
        $fk_paciente=$_POST['fk_paciente'];
        $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
        //este es el tipo de archivo
        $tipo = $_FILES['imagen']['type'];
        //leer el archivo temporal en binario
        $fp     = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $data = mysql_escape_string($data);

        $resultado = mysql_query("INSERT INTO imagenes (imagen, tipo_imagen, fk_paciente) VALUES ('$data', '$tipo','$fk_paciente')");
        if ($resultado){
            echo " <p> el archivo ha sido copiado exitosamente</p>";
            header("location:../expediente.php?pk_paciente=$fk_paciente");
            
        } else {
            echo "ocurrio un error al copiar el archivo.";
        }
    } else {
        echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
    }
}
?>