
<?php
mysql_connect('localhost','root','');
		mysql_select_db('consultorio_dental') or die(mysql_error());

    $pk_paciente = $_POST['fk_paciente'];
    $abono = $_POST['abono'];
    #$fecha = $_POST['fecha'];		

?>
<html>
<head>
	<title>Abonos</title>
		<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css" />
   <script  type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>

</head>
<body>
	<DIV class="container">
			<div class="page-header">
 			<h1>Abono <small class="glyphicon glyphicon-credit-card"></small></h1>
 
 <!-- <a href="../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>-->


     <?php 
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

		$verificar= mysql_query("SELECT fk_paciente FROM adeudos WHERE fk_paciente='$pk_paciente' ");
		if($fk_paciente=mysql_fetch_array($verificar)){
		require_once('clase_abono.php');


					# Crear un nuevo usuario
						$new_user_data = array( 'fk_paciente'=> $pk_paciente,
												'abono' => $abono,
						  						 );

						$usuario2 = new Abono();
							if($usuario2->set($new_user_data))
							{
							$obtener= mysql_query("SELECT t_pagar FROM adeudos WHERE fk_paciente='$pk_paciente'");
							(int)$obtener_convertido= mysql_fetch_array($obtener);
							$nuevo_adeudo=$obtener_convertido['t_pagar']-$abono;
		
							if($nuevo_adeudo<=0){
							$cambio=$nuevo_adeudo*(-1);
									echo '
									<div class="panel panel-default">
									<center><h4>La deuda esta saldada. 
									<br> Y el  sú cambio es de:  </h4></center>
  									<center><h2><code>$ 
  									'.$cambio.' </code></h2></center>
									</div>
									';
							$actualizar= mysql_query("UPDATE adeudos SET  t_pagar='0' WHERE fk_paciente = '$pk_paciente' ");

							}else
							{
							echo '
								<div class="panel panel-default"> 
								<h4>Ahora debe una cantidad de: <h2><code>$ '. $nuevo_adeudo .'</code></h2></h4>  
								<div class="panel-body">
								</div>
								</div>';
							$actualizar= mysql_query("UPDATE adeudos SET  t_pagar='$nuevo_adeudo' WHERE fk_paciente = '$pk_paciente' ");
							}
					$consulta_paciente= mysql_query("SELECT CONCAT(paciente.nombre,' ',paciente.apellidos) as nomb FROM `abono` INNER JOIN paciente on paciente.pk_paciente=abono.fk_paciente where paciente.pk_paciente='".$pk_paciente."'");
					$renglon_nombre=mysql_fetch_assoc($consulta_paciente);
					$nombre_paciente= $renglon_nombre['nomb'];

							echo '
							
							<h4> Se abonaron:  '.$abono. ' al paciente '.$nombre_paciente. '</h4>';
								////header("location:for_abono.php");
							}
							else
							{
								echo 'no';
							}
							#$usuario2->get($new_user_data['fecha']);
							}
							else{
 								echo "no existe adeudo, por lo cual no puede abonar";

	
							}
?>
  </div>
</div>
</DIV>
</body>
</html>