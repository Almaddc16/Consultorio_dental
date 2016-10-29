<?php  
require_once "../conectar.php"; 

$codigo = $_GET['codigo'];

//clase para hacer la consulta
class Material extends Modelo 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users($parametro = '') 
    { 
        $result = $this->_db->query("SELECT * FROM material WHERE codigo ='$parametro'"); 
         
        $users = $result->fetch_all(MYSQLI_ASSOC); 
         
        return $users; 
    } 
} 

//obtenemos los valores
	$materialModel = new Material(); 
    $renglon = $materialModel->get_users($codigo); 

    foreach($renglon as $row):
?>
<!doctype html lang="es">
<html>
<head>
	<title>Modificar material</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

	</head>
	<body>
		<DIV class="container">
			<div class="page-header">
  <h1>Modificar material.</h1>
  <a href="../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
</div>
<div class="panel panel-default">
  <div class="panel-body">
  	
   <div class="well"> 
    	
   </div>
 


 
		
		<form class="form-horizontal" name="formulario" method="post" action="updatematerial.php"> 
	
		
		<div style="display:none;">
		<label>ID:</label>
		<input type="text" name="pk_material" id="pk_material" value="<?php echo var_dump($row['pk_material']); ?>"readonly><br>
		</div>
	 <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Codigo</label>  
  <div class="col-md-4">
  <input type="text" name="codigo" value="<?php echo $row['codigo']; ?>" readonly class="form-control input-md">
 
  </div>
</div>
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">nom_material(s):</label>  
  <div class="col-md-4">
  <input  name="nom_material" type="text" value="<?php echo $row['nom_material']; ?>" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Descripcion:</label>  
  <div class="col-md-4">
  <input  name="descripcion" type="text" value="<?php echo $row['descripcion']; ?>" class="form-control input-md">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">unidades:</label>  
  <div class="col-md-4">
  <input  name="unidades" type="text" value="<?php echo $row['unidades']; ?>" class="form-control input-md">  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">costo_caja:</label>  
  <div class="col-md-4">
  <input  name="costo_caja" type="text" value="<?php echo $row['costo_caja']; ?>" class="form-control input-md">  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">costo_unitario:</label>  
  <div class="col-md-4">
  <input  name="costo_unitario" type="text" value="<?php echo $row['costo_unitario']; ?>" class="form-control input-md">  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">tope:</label>  
  <div class="col-md-4">
  <input  name="tope" type="text" value="<?php echo $row['tope']; ?>" class="form-control input-md">  
  </div>
</div>
		<!-- Text input  costo_unitario-->


		
		<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">IMAGEN</label>
    <div class="col-md-4">
      <input type="file" name="imagen" id="imagen" />

		
		</div>
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