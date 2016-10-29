<?php  
require_once "../../conectar.php"; 


//clase para hacer la consulta
class NuevaCita extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users() 
    { 
        $result = $this->_db->query("SELECT p.nombre,agenda.fecha
from agenda
INNER JOIN paciente p on p.pk_paciente=agenda.fk_paciente
WHERE fecha>'2016-02-01' AND fecha<'2016-02-30'
 "); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$NuevaCitaModel = new NuevaCita(); 
    $NuevaCitausers = $NuevaCitaModel->get_users(); 

?> 
<!doctype html lang="es">
<html>
<head>
	<title>Servicios</title>
	<meta charset="utf-8">
		
			<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css" />
	<script  type="text/javascript" src="../../../bootstrap/js/bootstrap.js"></script>
	
	</head>
	<body>

<DIV class="container">
	<div class="page-header">
  <h1>Citas del mes de Febrero <small></small></h1>
</div>


<div class="page-header">
	<a href="../../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
<a href="cita_pdf.php"><button class="btn btn-primary" type="button">
 Imprimir esta informacion <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
</div>
<br>
<br>

<table class="table table-striped">
<tr> <!-- esto es una fila sintomasmas_comunes.php-->

	<td>Paciente</td>
	<td>Fecha</td>


 </tr>
 <?php 
 	
 	foreach($NuevaCitausers as $row):
 echo"<tr>";
 	//echo"<td>".$row['COUNT(sintomas)']."</td>";
 		echo"<td>".$row['nombre']."</td>";
 		echo"<td>".$row['fecha']."</td>";

 		
		
 	/*echo "<td><a class='btn btn-primary btn-lg' href=eliminar_historial_paciente.php?pk_historial=".$row['pk_historial']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
	echo "<td><a class='btn btn-primary btn-lg' href=pdf.php?pk_historial=".$row['pk_historial']." "; ?>onclick="return confirm('¿Deseas imprimir este registrro?','Confirma')" <?php echo"> Imprimir </a></td>";
	*/
	/*		echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
	*/
echo"</tr>";
	endforeach
 										
?>
</table>

</DIV>

</html>