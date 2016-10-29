<?php  
require_once "../conectar.php"; 


//clase para hacer la consulta
class materialModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users() 
    { 
        $result = $this->_db->query('SELECT * FROM material'); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$materialModel = new materialModelo(); 
    $p_users = $materialModel->get_users(); 

?> 
<!doctype html lang="es">
<html>
<head>
	<title>Material</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
	<script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
	</head>
	<script src="../../bootstrap/js/jquery-latest.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
<DIV class="container">
	<div class="page-header">
  <h1>Tabla Materiales <small></small></h1>
</div>
<div class="page-header">
	<a href="../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
  <a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#material">
  Nuevo material<span class="btn-lg glyphicon glyphicon-edit"></span>
</button>
</a>
</div>



	<body>





<table  class="table table-striped">
<tr> <!-- esto es una fila-->
	<td>Id</td>
	<td>Código</td>
	<td>Nombre</td>
	<td>Descripción</td>
	<td>Unidades</td>
	<td>Costo por caja</td>
	<td>Costo por unidades</td>
	<td>Tope</td>
	<td>Eliminar</td>


 </tr>
 <?php 
 	

 	foreach($p_users as $row):
 echo"<tr>";

 		echo"<td> ".$row['pk_material']."</td>";
 		echo"<td>".$row['codigo']."</td>";
 		echo"<td>".$row['nom_material']."</td>";
 		echo"<td>".$row['descripcion']."</td>";
 		echo"<td>".$row['unidades']."</td>";
 		echo"<td>".$row['costo_caja']."</td>";
 		echo"<td>".$row['costo_unitario']."</td>";
 		echo"<td>".$row['tope']."</td>";
 	
 	
 echo '<td><a href="#" data-toggle="modal" data-target="#jobModal'.$row['pk_material'].'" >Click here to edit</a>' . $row['pk_material'] . '</td>';
       
 		echo "<td><a class='btn btn-primary btn-lg' href=eliminar_material.php?codigo=".$row['codigo']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
	/*	echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
	*/
echo"</tr>";
?>
<div><!-- para nueva cita-->

<div class="modal fade" id="material<?php echo $row['pk_material']; ?>"tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user">
      </span> Insertar nuevo material </label></h4>
      </div>
      <div class="modal-body">

         <!---->    
                    		<div class="contenedor">
						
 		

 						

<form method="POST" action="insertar_material.php" enctype="multipart/form-data">
							<h2>Materiales</h2>

							<div class="form-group">
							<label for="exampleInputEmail1">Codigo:</label>  
 							<input name="codigo" type="text" placeholder="124de546fs5" class="form-control" required> 
 							</div>

 							<div class="form-group">
 							<label for="exampleInputEmail1">Nomdre del material:</label>  
 							<input name="nom_material" type="text" placeholder="Material 1" class="form-control"  required=> <br>
 							</div>
							
							<div class="form-group">
 							<label for="exampleInputEmail1">Descripción:</label>
 							<textarea  name="descripcion" rows="5" cols="10" placeholder="Descripción de material." class="form-control"required=""></textarea>
 							</div>

 							<div class="form-group">
 							<label for="exampleInputEmail1">Unidades:</label>  
 							<input name="unidades" type="number" placeholder="10"class="form-control"  required=""> 
 							</div>

 							<div class="form-group">
 							<label for="exampleInputEmail1">Costo por caja:</label>  
 							<input name="costo_caja" type="text" placeholder="500" class="form-control" required=""> 
 							</div>

 							<div class="form-group">
 							<label for="exampleInputEmail1">Costo unitario:</label>  
 							<input name="costo_unitario" type="text" placeholder="50" class="form-control" required=""> 
							</div>

							<div class="form-group">
 							<label for="exampleInputEmail1">Tope:</label>  
 							<input name="tope" type="number" placeholder="no se que es " class="form-control" required=""> 
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

<?php 

	endforeach
 										
?>

</table>


</DIV>

</html>


