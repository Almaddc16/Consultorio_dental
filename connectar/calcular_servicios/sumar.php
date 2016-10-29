<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

</head>
<body>
<DIV class="container">
	<div class="page-header">
  <h1>Paso 2 <small> Inserte el pago del cliente</small></h1>
</div>
<?php 
		mysql_connect('localhost','root','');
		mysql_select_db('consultorio_dental') or die(mysql_error());
		$fk =$_POST['fk'];
		//si se presiona en el boton sumar
		if(@$_POST['BtnSumar'])
		{
			
			//inicializamos la variable
			$resultado = 0;
			foreach ($_POST['pk_servicio'] as $pk_servicio) 
			{

			$arreglo_costo = mysql_query('SELECT costo FROM servicio WHERE pk_servicio='.$pk_servicio);

			$x= mysql_fetch_array($arreglo_costo);

			//el "+=" es como decir ' $resultado = $resultado + '
			$resultado += (int)$x["costo"];

			}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>Document</title>
</head>
<body>
<fieldset>
<div class='panel panel-default'>
  <div class='panel-body'>

  </div>

<form action='restar.php' method='POST' class='form-horizontal'>
<!-- Text input-->
<div class='form-group'>
  <label class='col-md-4 control-label' for='fk'>Numero de expediente</label>  
  <div class='col-md-4'>
  <input id='fk' name='fk' type='text' value='$fk' class='form-control input-md' readonly>
    
  </div>
</div>

<!-- Text input-->
<div class='form-group'>
  <label class='col-md-4 control-label' for='resultado'>Subtotal</label>  
  <div class='col-md-4'>
  <input id='resultado' name='resultado' type='text' readonly value='$resultado' class='form-control input-md'>
  <span class='help-block'>Cantidad de de la suma de los servicios.</span>  
  </div>
</div>


<!-- Text input-->
<div class='form-group'>
  <label class='col-md-4 control-label' for='pago'>Importe de paciente</label>  
  <div class='col-md-4'>
  <input id='pago' name='pago' type='number' class='form-control input-md' required>
    
  </div>
</div>
<!-- Button -->
<div class='form-group'>
  <label class='col-md-4 control-label' for='boton'>Siguiente</label>
  <div class='col-md-4'>
    <button id='boton' name='boton' class='btn btn-primary'>Siguiente</button>
  </div>
</div>




</form>
</fieldset>
</div>
</body>
</html>";

			//header('Location: chec.php');
		}



 ?>
</DIV>
</body>
</html>