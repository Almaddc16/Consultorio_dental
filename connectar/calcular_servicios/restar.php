<html>
<head>
	<title>Paso 3</title>
		<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

</head>
<body>
<DIV class="container">
<div class="page-header">
  <h1>Paso 3 <small>Calculo concluido y reguistrado.</small></h1>
  <!--voton para ir a inicio-->

<?php 

mysql_connect('localhost','root','');
		mysql_select_db('consultorio_dental') or die(mysql_error());

$fk=$_POST['fk'];
$resultado=$_POST['resultado'];
$pago=$_POST['pago'];
$total = $_POST['pago'] - $_POST['resultado']; 


$pk_paciente = $_POST['fk'];
     
echo "<a href=../paciente/expediente.php?pk_paciente=$pk_paciente> 
<button class='btn btn-primary' type='button'>
 Regresar a expediente<span class='btn-lg glyphicon glyphicon-cog'></span>
</button>
 </a>";
     ?>
     


</div>
<div class="panel panel-default">
  <div class="panel-body">

  
<?php


if ($total<=0) {
	$adeudo= $total *(-1);
	

	echo '<h4> La cantidad que resta por pagar es de:</h4><h4 class="help-block"> <code>'. $adeudo. '</code></h4>'; 
	echo '<h4>De la cantidad:</h4><h4 class="help-block"> <code>'.$resultado .'</code></h4>';
	echo '<h4> Al paciente con el  numero de expediente</h4><h4 class="help-block"> <code>'. $fk .'</code></h4>';
	echo '<h4> el cual dio un pago inicial de:</h4><h4 class="help-block"> <code>' .$pago .'</code></h4> <br>';
		
$verificar= mysql_query("SELECT fk_paciente FROM adeudos WHERE fk_paciente='$fk' ");
		if($fk=mysql_fetch_array($verificar)){
		
	echo '<h3>Pero devido a que ya existe un adeudo en la base de datos </h3>';
#t_pagar es el campo de la tabla que se le sumara

	$obtener= mysql_query("SELECT t_pagar FROM adeudos WHERE fk_paciente=$_POST[fk] ");
	(int)$obtener_convertido= mysql_fetch_array($obtener);
	
			$nuevo_adeudo=$adeudo+$obtener_convertido['t_pagar'];
			echo '<h4>Ahora debe una cantidad de: <code><h2>$ '. $nuevo_adeudo .'</h2></code></h4>';
			$actualizar= mysql_query("UPDATE adeudos SET fk_paciente='$_POST[fk]', adeudo='$_POST[resultado]', importe='$_POST[pago]', t_pagar='$nuevo_adeudo' WHERE fk_paciente = '$_POST[fk]' ");

}else{
	mysql_query("INSERT INTO adeudos (fk_paciente,adeudo,importe,t_pagar) VALUES ('$_POST[fk]','$resultado','$pago','$adeudo')");

	echo 'no existe y se registrara.';
}

		# code...mysql_query("INSERT INTO adeudos (fk_paciente,adeudo,importe,t_pagar) VALUES ('$fk','$resultado','$pago','$adeudo')");  


}else{

	echo 'su cambio es';
	$total;
}
?>

</div>
</div>
</DIV>
</body>
</html>