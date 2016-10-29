<?php  
require_once "../conectar.php"; 

$curp = $_GET['curp'];

//clase para hacer la consulta
class paciente extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users($parametro = '') 
    { 
        $result = $this->_db->query("SELECT * FROM paciente WHERE curp ='$parametro'"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$pacienteModel = new paciente(); 
    $renglon = $pacienteModel->get_users($curp); 

    foreach($renglon as $row):
?>
<!doctype html lang="es">
<html>
<head>
	<title>Modificar paciente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

	</head>
	<body>
		<DIV class="container">
			<div class="page-header">
  <h1>Modificar expediente.</h1>
  <a href="../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
</div>
<div class="panel panel-default">
  <div class="panel-body">
  	
   <div class="well"> 
    	
   </div>
 
		
		<form class="form-horizontal" name="formulario" method="post" action="update.php"> 
	
		
		<div style="display:none;">
		<label>ID:</label>
		<input type="text" name="pk_paciente" id="pk_paciente" value="<?php echo  $row['pk_paciente']; ?>"readonly><br>
		</div>
		
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre(s):</label>  
  <div class="col-md-4">
  <input  name="nombre" type="text" value="<?php echo $row['nombre']; ?>" class="form-control input-md">  
  </div>
</div>
	<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Apellidos:</label>  
  <div class="col-md-4">
  <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>"  class="form-control input-md">
 
  </div>
</div>

		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">CURP:</label>  
  <div class="col-md-4">
  <input type="text" name="curp" value="<?php echo $row['curp']; ?>"  class="form-control input-md">
 
  </div>
</div>
	
	<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Edad:</label>  
  <div class="col-md-4">
  <input type="number"  name="edad" value="<?php echo $row['edad']; ?>" class="form-control input-md">
  </div>
</div>
		
		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Fecha de nacimiento:</label>  
  <div class="col-md-4">
  <input type="date"  name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>" class="form-control input-md">
  </div>
</div>

		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Sexo:</label>  
  <div class="col-md-4">
  <input type="text"  name="sexo" value="<?php echo $row['sexo']; ?>" class="form-control input-md">
  </div>
</div>
		
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Enfermedades_cronicas:</label>  
  <div class="col-md-4">
  <input type="text"  name="enfermedades_cronicas" value="<?php echo $row['enfermedades_cronicas']; ?>" class="form-control input-md">
  </div>
</div>		
		
		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Alergias:</label>  
  <div class="col-md-4">
  <input type="text" name="alergias" value="<?php echo $row['alergias']; ?>"  class="form-control input-md">
  </div>
</div>
		
		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Localidad de origen:</label>  
  <div class="col-md-4">
  <input type="text"  name="localidad_origen" value="<?php echo $row['localidad_origen']; ?>" class="form-control input-md">
  </div>
</div>
		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Dirección:</label>  
  <div class="col-md-4">
  <input type="text"  name="direccion" value="<?php echo $row['direccion']; ?>" class="form-control input-md">
  </div>
</div>
		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Telefono:</label>  
  <div class="col-md-4">
  <input type="number" name="telefono" value="<?php echo $row['telefono']; ?>"  class="form-control input-md">
  </div>
</div>

		
		<div style="display:none;">
		<label>IMAGEN</label>
		<input type="text" name="IMAGEN" value="<?php echo $row['IMAGEN']; ?>"><br>
		</div>
<?php 
endforeach
 ?>
 <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Precione para actualizar</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Actualizar</button>
  </div>
</div>
		
		</form>
  </div>
</div>		
</DIV>
</body>
</html>