<?php  
require_once "../conectar.php"; 


//clase para hacer la consulta
class servicioModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users() 
    { 
        $result = $this->_db->query('SELECT * FROM servicio'); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$servicioModel = new servicioModelo(); 
    $s_users = $servicioModel->get_users(); 

?> 
<!doctype html lang="es">
<html>
<head>
	<title>Servicios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />

	</head>
	<body>


<div class="container">
			
<div class="jumbotron">
  
<h3>Consultorio Dental</h3>
<p><a class="btn btn-primary btn-lg glyphicon glyphicon-th" href="../../index.php" role="button"> Inicio</a></p>
</div>
<div class="panel panel-primary">
	 <div class="panel-heading">Servicios</div>
<table class="table">

<tr> <!-- esto es una fila-->
	<td>Identidicador</td>
	<td>Nombre de servicio</td>
	<td>Costo</td>
	<td>Eliminar</td>

 </tr>
 <?php 
 	
 	foreach($s_users as $row):
 echo"<tr>";
 		echo"<td>".$row['pk_servicio']."</td>";
 		echo"<td>".$row['nom_servicio']."</td>";
 		echo"<td>".$row['costo']."</td>";
 	
 	

		
 		echo "<td><a class='btn btn-primary btn-lg' href=eliminar_servicio.php?nom_servicio=".$row['nom_servicio']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
		/*echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
	*/
echo"</tr>";
	endforeach
 										
?>
</table>

</div>
</div>

</html>