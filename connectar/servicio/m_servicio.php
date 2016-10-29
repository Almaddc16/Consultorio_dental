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
	<script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
	<script src="../../bootstrap/js/jquery-latest.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
<DIV class="container">
	<div class="page-header">
  <h1>Tabla Servicios <small></small></h1>
</div>
<div class="page-header">
	<a href="../../index.php"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
  <a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#foto">
  Nuevo servicio<span class="btn-lg glyphicon glyphicon-edit"></span>
</button>
</a>
</div>

<div><!-- para nueva cita-->

<div class="modal fade" id="foto"tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user">
      </span> Insertar nuevo Servicio </label></h4>
      </div>
      <div class="modal-body">

         <!---->    
                    		<div class="contenedor">
						<form method="POST" action="insertar_servicio.php" enctype="multipart/form-data">
							
							<div class="form-group">
    <label for="exampleInputEmail1">Nombre de servicio:</label>
    <input name="nom_servicio" type="text"  required class="form-control"  placeholder="Ejemplo">
  </div>
  			<div class="form-group">
    <label for="exampleInputEmail1">Costo de servicio:</label>
    <input name="costo" type="number" required class="form-control"  placeholder="Ejemplo">
  </div>
							
 					

 							<center>	
 							<input type="submit" class="btn btn-default"  value="| Registrar |"> <!-- Boton -->
 							</center>

						</form>
						</div>
					
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div><!-- div para cerrar cita-->

<div class="panel panel-default">
  <div class="panel-body">


<table  class="table table-striped">

<tr> <!-- esto es una fila-->
	<td>Id</td>
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
</DIV>



</html>