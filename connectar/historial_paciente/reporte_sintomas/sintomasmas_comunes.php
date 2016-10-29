<?php  
require_once "../../conectar.php"; 


//clase para hacer la consulta
class h_pacienteModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users() 
    { 
        $result = $this->_db->query("SELECT COUNT(sintomas)AS'num', sintomas FROM historial_paciente
GROUP by sintomas"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$h_pacienteModel = new h_pacienteModelo(); 
    $h_paciente_users = $h_pacienteModel->get_users(); 

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
  <h1>Sintoas más comunes <small></small></h1>
</div>


<div class="page-header">
	<a href="../../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
<a href="sintmas_pdf.php"><button class="btn btn-primary" type="button">
 Imprimir esta informacion <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
</div>
<br>
<br>

<table class="table table-striped">
<tr> <!-- esto es una fila sintomasmas_comunes.php-->
	<td># de pacientes con sintomas</td>

	<td>Sintomas</td>


 </tr>
 <?php 
 	
 	foreach($h_paciente_users as $row):
 echo"<tr>";
 	//echo"<td>".$row['COUNT(sintomas)']."</td>";
 		echo"<td>".$row['sintomas']."</td>";
 		
		
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

