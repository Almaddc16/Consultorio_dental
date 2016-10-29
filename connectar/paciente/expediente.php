<?php  
require_once "../conectar.php"; 

$pk_paciente = $_GET['pk_paciente'];

//clase para hacer la consulta
class pModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users($parametro = '') 
    { 
        $result = $this->_db->query("SELECT * FROM paciente where pk_paciente='$parametro'"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$pModel = new pModelo(); 
    $p_users = $pModel->get_users($pk_paciente); 


//clase para hacer la consulta
class h_pacienteModelo extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users($parametro='') 
    { 
        $result = $this->_db->query("SELECT * FROM historial_paciente where fk_paciente='$parametro'"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
  $h_pacienteModel = new h_pacienteModelo(); 
    $h_paciente_users = $h_pacienteModel->get_users($pk_paciente); 


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
	<title>Expediente personal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

	</head>
	<body>


 <?php 
 	
 	foreach($p_users as $row):

?>
<div class="container">
<div class="page-header">
<!--voton para ir a inicio-->
<a href="../../index.php"><button class="btn btn-primary" type="button">
 Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>

<!--voton para añadir foto-->
<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal2">
  Nueva consulta <span class="btn-lg glyphicon glyphicon-plus"></span>
</button>
</a>
 <!-- Button trigger modal -->

<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#abono">
  Abonar<span class="btn-lg glyphicon glyphicon-usd"></span>
</button>
</a>

<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#cita">
  Nueva cita<span class="btn-lg glyphicon glyphicon-calendar"></span>
</button>
</a>

<!--voton para añadir foto-->
<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#foto">
  Foto<span class="btn-lg glyphicon glyphicon-picture"></span>
</button>
</a>

<?php 
echo "<a href=../historial_paciente/reporte_sintomas/paciente_pdf.php?pk_paciente=".$row['pk_paciente']." "; ?>onclick="return confirm('¿Deseas imprimir la informacion del expediente?','Confirma')" <?php echo"> 
<button class='btn btn-primary' type='button'>
 Imprimir info<span class='btn-lg glyphicon glyphicon-print'></span>
</button>
 </a>";
     ?>

     <?php 
echo "<a href=modificar.php?curp=".$row['curp']." "; ?>onclick="return confirm('¿En verdad deseas Modificar este registrro?','Confirma')" <?php echo"> 
<button class='btn btn-primary' type='button'>
 Modificar<span class='btn-lg glyphicon glyphicon-cog'></span>
</button>
 </a>";
     ?>

<!--voton para añadir foto-->
<a href="#"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#servicios">
  Calcular<span class="btn-lg glyphicon glyphicon-list-alt"></span>
</button>
</a>
</div>


  <div><!-- para nueva cita-->

<div class="modal fade" id="foto"tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user"></span> Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?></h4>
      </div>
      <div class="modal-body">

         <!---->

                  
                    <form  class="form-horizontal" action="updateimgpaciente.php" method="POST" enctype="multipart/form-data">
                    <label for="imagen">Imagen:</label>
     <div class="col-md-4">
                      <input id="textinput"  name="pk_paciente" value="<?php echo"".$row['pk_paciente'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block"></span>  
                      </div>

                    <input type="file" name="imagen" id="imagen" required="" />
                    
                    <input type="submit" name="subir"  class="btn btn-primary" value="Subir"/>
                    </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div><!-- div para cerrar cita-->
 
  <div><!-- para abono-->
<div id="abono"class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user"></span> Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?></h4>
      
      </div>
      <div class="modal-body">
     <form class="form-horizontal" name="formulario" method="post" action="../abono/insertar_abono.php">
                <fieldset>

                    <!-- Form Name -->
                    <legend> Abono</legend>
                    <!-- Text input-->
                     <!-- Text input-->
                    <div class="form-group" style="display:none;">
                      <label class="col-md-4 control-label" for="textinput">PK_Paciente:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  name="fk_paciente" value="<?php echo"".$row['pk_paciente'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block"></span>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">Curp:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  value="<?php echo"".$row['curp'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block">Verifique que la CURP sea correcta</span>  
                      </div>
                    </div>
                  

                      <!-- Text input-->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="abono">Cantidad a abonar:</label>  
                        <div class="col-md-4">
                        <input id="abono" name="abono" type="number" placeholder="100" class="form-control input-md">
                        <span class="help-block">¿Cuanto abonara el paciente?</span>  
                        </div>
                      </div>
                      <div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"> </label>
 
    <button id="singlebutton" name="singlebutton" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></button>
  </div>


               </fieldset></form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!-- div para cerrar abono-->
 
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user"></span> Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?></h4>
      </div>
      <div class="modal-body">
                
                <form class="form-horizontal" name="formulario" method="post" action="../historial_paciente/insertar_historial_paciente.php">
                <fieldset>


                    <!-- Form Name -->
                    <legend> Nueva consulta</legend>
                    <!-- Text input-->
                     <!-- Text input-->
                    <div class="form-group" style="display:none;">
                      <label class="col-md-4 control-label" for="textinput">PK_Paciente:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  name="fk_paciente" value="<?php echo"".$row['pk_paciente'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block"></span>  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">Curp:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  value="<?php echo"".$row['curp'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block">Verifique que la CURP sea correcta</span>  
                      </div>
                    </div>
                  

                  <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="sintomas">Síntomas: </label>
                      <div class="col-md-4">                     
                       <textarea class="form-control" id="sintomas" name="sintomas"  placeholder="Escriba sintomas" rows="5" required=""></textarea>
                      </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                     <label class="col-md-4 control-label" for="reseta">Se receta</label>
                     <div class="col-md-4">                     
                       <textarea class="form-control" id="reseta" name="receta" rows="5" placeholder="se receta" required=""></textarea>
                     </div>
                    </div>
                       <!-- Text input-->
                    <div class="form-group" style="display:none;">
                      <label class="col-md-4 control-label" for="textinput">PK_Paciente:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  name="foto_diagnostico" value="Foto pendiente"   class="form-control input-md" readonly>
                      <span class="help-block"></span>  
                      </div>
                    </div>
                    
              
                        <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"> </label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></button>
  </div>
</div>
                </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> cerrar</button>
   
              </form>      
      </div>
    </div>
  </div>
</div>



  <div><!-- para calcular-->

<div class="modal fade" id="servicios" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user"></span> Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?></h4>
      </div>
      <div class="modal-body">

 

           <?php 
    mysql_connect('localhost','root','');
    mysql_select_db('consultorio_dental') or die(mysql_error());
   ?>




   <form action="../calcular_servicios/sumar.php" method="POST">
    <fieldset>

<!-- Form Name -->
<legend>Paso 1</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fk_paciente">Numero de paciente</label>  
  <div class="col-md-4">
  <input id="fk_paciente" name="fk" type="text" value="<?php echo"".$row['pk_paciente'].""; ?>" readonly class="form-control input-md" >
  <span class="help-block">Asegúrese de que el numero de paciente es el correcto</span>  
  </div>
</div>


     <table class="table table-striped">
    <caption>Seleccione los servicios a calcular</caption>
    <th>Id |</th>
    <th>Servicio |</th>
    <th>Costo |</th>
    <th><input type="submit" name="BtnSumar" value="sumar"></th>
<?php 
$Consulta =mysql_query('SELECT * from servicio');
while ($Servicios = mysql_fetch_array($Consulta)):
 ?>
  <tr>
    <td><?php echo $Servicios['pk_servicio']?></td>
    <td><?php echo $Servicios['nom_servicio']?></td>
    <td><?php echo $Servicios['costo']?></td>
    <td><input type="checkbox" name="pk_servicio[]" value="<?php echo $Servicios['pk_servicio'] ?>"/></td>

  </tr>
  <?php endwhile; ?>
   </table>

</fieldset>
   </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div><!-- div para calcular cita-->
 


<div><!-- para nueva cita-->

<div class="modal fade" id="cita"tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"> <label><span class="btn-lg glyphicon glyphicon-user"></span> Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?></h4>
      </div>
      <div class="modal-body">

         <!---->

                    <form class="form-horizontal" method="post" action="../agenda/insertarcita.php">



            <!-- Form Name -->

<div class="form-group" style="display:none;">
                      <label class="col-md-4 control-label" for="textinput">PK_Paciente:</label>  
    
                      <div class="col-md-4">
                      <input id="textinput"  name="fk_paciente" value="<?php echo"".$row['pk_paciente'].""; ?>"   class="form-control input-md" readonly>
                      <span class="help-block"></span>  
                      </div>
                    </div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha">Fecha</label>  
  <div class="col-md-4">
  <input id="fecha" name="fecha" type="date" placeholder="" class="form-control input-md" required="">
  <span class="help-block">Seleccione la fecha de cita</span>  
  </div>
</div>
<fieldset>

<!-- Form Name -->
<legend>Datos entrada</legend>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="h_entrada">Hora de entrada</label>
  <div class="col-md-4">
    <select id="h_entrada" name="h_entrada" class="form-control">
      <option value="0"></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
     <option value="11">12</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="min_entrada">Minuto:</label>
  <div class="col-md-4">
    <select id="min_entrada" name="min_entrada" class="form-control">
     <option value="0">00</option>
      <option value="5">5</option>

      <option value="15">15</option>

      <option value="25">25</option>

      <option value="35">35</option>

      <option value="45">45</option>

    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ampm">AM - PM</label>
  <div class="col-md-4">
    <select id="ampm" name="ampm" class="form-control">
      <option value="am">am</option>
      <option value="pm">pm</option>
    </select>
  </div>
</div>

</fieldset>
<fieldset>

<!-- Form Name -->
<legend>Datos Salida</legend>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="h_entrada">Hora de entrada</label>
  <div class="col-md-4">
    <select id="h_salida" name="h_salida" class="form-control">
      <option value="0"></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
     <option value="11">12</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="min_entrada">Minuto:</label>
  <div class="col-md-4">
    <select id="min_salida" name="min_salida" class="form-control">
      <option value="0">00</option>
      <option value="5">5</option>

      <option value="15">15</option>

      <option value="25">25</option>

      <option value="35">35</option>

      <option value="45">45</option>

    </select>
  </div>
</div>
<p id ="mensaje"> <span></span></p>
</fieldset>



<input  id="registrar" type="submit"class="btn btn-primary">
</form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div><!-- div para cerrar cita-->


<script src="../../bootstrap/js/jquery-latest.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<div class="page-header">
  <h1> <span class="glyphicon glyphicon-folder-open"></span> Expediente numero<small><?php echo" ".$row['pk_paciente'].""; ?></small></h1>
</div>
<div class="panel panel-default">


  <div class="panel-body">
<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
   
    <?php 
    
    $img=$row['imagen'];
    echo "<td><img  class='media-object' src='$img' ></td>";

?>
    </a>
  </div>
  

  <label>Nombre: </label><?php echo" ".$row['nombre'].""; echo" ".$row['apellidos']."<br>";?>
    <label> Edad: </label><?php  echo" ".$row['edad']."<br>";?>
  
    <label>CURP:</label> <?php echo" ".$row['curp']."<br>"; ?> 
    <label>Fecha de nacimiento:</label><?php echo" ".$row['fecha_nac']."<br>"; ?>
  <label>Sexo:</label><?php  echo" ".$row['sexo'].""; ?>
</div>

  				<div class="panel panel-default">
 					 <div class="panel-body">
 						<label>Alergias:</label><?php echo" ".$row['alergias']." <br>";?>
  						<label> Enfermedades cronicas:</label><?php echo" ".$row['enfermedades_cronicas']."<br>";?>
						<label></label><?php  ?>
  					</div>
				</div>
	<label>Localidad:</label><?php echo" ".$row['localidad_origen']."<br>"; ?>
	<label>Dirección:</label><?php  echo" ".$row['direccion']."<br>"; ?>
	<label>Telefono:</label><?php  echo" ".$row['telefono']."";?>
  </div>

<!--<?php 
/*echo "<td><a class='btn btn-primary btn-lg' href=../abono/for_abono.php?pk_paciente=".$row['pk_paciente']." "; ?>onclick="return confirm('¿esta seguro de realizar un abono a la cuenta de este paciente?','Confirma')" <?php echo"> Abonar </a></td>";
 */?>-->
</div>
<!--
 		echo"".$row['pk_paciente']."";
 		echo"".$row['nombre']."";
 		echo"".$row['apellidos']."";
 		echo"".$row['curp']."";
 		echo"".$row['edad']."";
 		echo"".$row['fecha_nac']."";
 		echo"".$row['sexo']."";
 		echo"".$row['enfermedades_cronicas']."";
 		echo"".$row['alergias']."";
 		echo"".$row['localidad_origen']."";
 		echo"".$row['direccion']."";
 		echo"".$row['telefono']."";
		echo"".$row['foto']."";

-->
<?php		
 		/*echo "<td><a class='btn btn-primary btn-lg' href=eliminar_paciente.php?curp=".$row['curp']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
		/*echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
	*/

	endforeach
 										
?>

<table class="table">
<tr> <!-- esto es una fila-->
 <!-- <td>Id</td>-->
  <td>Fecha de consulta</td>
 <!-- <td>Num de paciente</td>-->
  <td>Sintomas</td>
  <td>Recetas</td>
  <!--<td>Foto de diagnostico</td>-->
  
  <td>Eliminar</td>
  <td>Imprimir</td>
 </tr>
 <?php 
  
  foreach($h_paciente_users as $row):
 echo"<tr>";
    /*echo"<td>".$row['pk_historial']."</td>";*/
    echo"<td>".$row['fecha_consulta']."</td>";
    /*echo"<td>".$row['fk_paciente']."</td>";*/
    echo"<td>".$row['sintomas']."</td>";
    echo"<td>".$row['receta']."</td>";
    /*echo"<td>".$row['foto_diagnostico']."</td>";  */  
  echo "<td><a class='btn btn-primary btn-lg' href=../historial_paciente/eliminar_historial_paciente.php?pk_historial=".$row['pk_historial']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
  /*    echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
  */
      echo "<td><a class='btn btn-primary btn-lg' href=../historial_paciente/pdf.php?pk_historial=".$row['pk_historial']." "; ?>onclick="return confirm('¿Deseas imprimir este registrro?','Confirma')" <?php echo"> Imprimir </a></td>";
  
echo"</tr>";
  endforeach
                    
?>
</table>
<!--
<table class="table">

<tr>  esto es una fila
  <td>Identidicador</td>
  <td>Nombre de servicio</td>
  <td>Costo</td>
  <td>Eliminar</td>


 </tr>--> <!--<?php 
  
  /*foreach($s_users as $row):
 echo"<tr>";
    echo"<td>".$row['pk_servicio']."</td>";
    echo"<td>".$row['nom_servicio']."</td>";
    echo"<td>".$row['costo']."</td>";
  
  

    
    echo "<td><a class='btn btn-primary btn-lg' href=eliminar_servicio.php?nom_servicio=".$row['nom_servicio']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo"> Eliminar </a></td>";
    /*echo "<td><a href=modificar_paciente.php?email=".$row['email']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registrro?','Confirma')" <?php echo"> Modificar </a></td>";
  */
/*echo"</tr>";
  endforeach
  */                 
?>
</table>
-->

</div>
</div>
</html>



