<?php  
require_once "../conectar.php"; 


//clase para hacer la consulta
class pacienteModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users() 
    { 
        $result = $this->_db->query('SELECT * FROM paciente'); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$pacienteModel = new pacienteModelo(); 
    $p_users = $pacienteModel->get_users(); 

?> 
<!doctype html lang="es">
<html>
<head>
	<title>Paciente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />

	</head>
	<body>

			
<div class="page-header">
<p><a class="btn btn-primary btn-lg glyphicon glyphicon-th" href="../../index.php" role="button"> Inicio</a></p>
  <h1><small class="btn-lg glyphicon glyphicon-user"></small> Paciente </h1>
</div>

<table class="table">
<tr> <!-- esto es una fila-->
	<td>ID</td>
	<td>Nombre</td>
	<td>Apellidos</td>
	<td>Curp</td>
	<td>Edad</td>
	<td>Fecha de nacimiento</td>
	<td>Sexo</td>
	<td>Enfermedades cronicas</td>
	<td>Alergias</td>
	<td>Localidad de origen</td>
	<td>Direccion</td>
	<td>Telefono</td>
	<td>IMG</td>
		
	<td>Eliminar</td>	
	<td>Modificar</td>	
 </tr>
 <?php 
 	
 	foreach($p_users as $row):
 echo"<tr>";
 		echo"<td>".$row['pk_paciente']."</td>";
 		echo"<td>".$row['nombre']."</td>";
 		echo"<td>".$row['apellidos']."</td>";
 		echo"<td>".$row['curp']."</td>";
 		echo"<td>".$row['edad']."</td>";
 		echo"<td>".$row['fecha_nac']."</td>";
 		echo"<td>".$row['sexo']."</td>";
 		echo"<td>".$row['enfermedades_cronicas']."</td>";
 		echo"<td>".$row['alergias']."</td>";
 		echo"<td>".$row['localidad_origen']."</td>";
 		echo"<td>".$row['direccion']."</td>";
 		echo"<td>".$row['telefono']."</td>";
		
 	



 		
 		$img=$row['imagen'];
 		echo "<td><img src='$img' width='200' height='200'></td>";











		
 		echo "<td><a class='btn btn-primary btn-lg' href=eliminar_paciente.php?curp=".$row['curp']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
		echo "<td><a class='btn btn-primary btn-lg' href=modificar.php?curp=".$row['curp']." "; ?>onclick="return confirm('¿En verdad deseas Modificar este registrro?','Confirma')" <?php echo"> Modificar</a></td>";
		
			/*echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
	*/
echo"</tr>";
	endforeach
 										
?>
</table>



</html>



