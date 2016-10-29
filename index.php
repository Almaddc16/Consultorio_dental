
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Consultorio  Dental</title>
	
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/tabstyles.css" />

		<!--para buscador -->

		<script type="text/javascript" src="ajax.js"></script>


  		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<svg class="hidden">
			<defs>
				<path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
			</defs>
		</svg>
		<div class="container">
			<!-- Top Navigation -->
			

			<section>
				<div class="tabs tabs-style-tzoid">
					<nav>
						<ul>
							<li><a href="#section-tzoid-1" class="icon icon-home"><span>Home</span></a></li>
							<li><a href="#section-tzoid-2" class="icon icon-box"><span>Nuevo Paciente</span></a></li>
							<li><a href="#section-tzoid-3" class="glyphicon glyphicon-search"><span ></span> Buscar</a></li>
							

							<!--<li><a href="#section-tzoid-4" class="icon icon-display"><span>Servicios</span></a></li>-->
							<li><a href="#section-tzoid-5" class="icon icon-date"><span>Editar registros</span></a></li>
						

						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-tzoid-1">
						<!--
					<a href="connectar/historial_paciente/reporte_sintomas/sintomasmas_comunes.php">
					<input type="submit" class="boton" value="Sintomas mas frecuentes"></a> 
						<br>
					<a href="connectar/historial_paciente/m_historial_paciente.php">
					<input type="submit" class="boton" value="imprimir resetas"></a> 
						<br>
					<a href="connectar/historial_paciente/reporte_sintomas/cita_pendiente.php">
					<input type="submit" class="boton" value="Citas del mes de Febrero"></a>
								<br>
					<a href="connectar/historial_paciente/reporte_sintomas/cita_pendiente.php">
					<input type="submit" class="boton" value="Ver pacientes que tiene adeudos"></a> 
-->


<div class="container">
						<?php
include_once("graficacion/graficaSintomas.php");
$obj = new graficaEmpleado();
$chart = $obj->graficaPorDepartamento();
#https://enboliviacom.wordpress.com/2012/09/12/open-flash-chart-2-con-php-y-mysql/
?>

<script type="text/javascript" src="graficacion/open_flash_chart2/js/json/json2.js"></script>
<script type="text/javascript" src="graficacion/open_flash_chart2/js/swfobject.js"></script>
<script type="text/javascript">
swfobject.embedSWF(
"graficacion/open_flash_chart2/open-flash-chart.swf", "div_chart",
"620", "460", "9.0.0", "expressInstall.swf");
</script>
<script type="text/javascript">
function open_flash_chart_data(){
return JSON.stringify(data);
}
var data = <?php echo $chart; ?>;
</script>
<div id="div_chart"></div>
</div>						
						<!--<a href="graficacion/index.php"><input type="submit" class="boton" value="Ver grafica de sintomas"></a> 
					<br>
						<a href="connectar/paciente/expediente.php"><input type="submit" class="boton" value="Expediente"></a> 

						-->
						

						</section>
				<section id="section-tzoid-2"><!-- seccion 2 para registrar nuevo pasiente. -->
					<!-- Form para insertar nuevo  pacisnte. -->
					<div class="contenedor">
					<form method="POST" action="connectar/paciente/insertar_paciente.php" enctype="multipart/form-data">
							<!-- Text input nombre-->

 					<label>Nombre(s):</label>  <br>
 					<input  name="nombre" type="text" placeholder="Alma Delia"  required=""> <br>
							<!-- Text input apellido-->

 					<label>Apellidos:</label>  <br>
 					<input name="apellidos" type="text" placeholder="Delgadillo Carrillo" required=""> <br>

 							<!-- Text input apellido-->

 					<label>Curp:</label>  <br>
 					<input name="curp" type="text" placeholder="DECAVFTRLND" required=""> <br>
							<!-- Text input para edad-->

  					<label>Edad:</label>  <br>
  					<input  name="edad" type="number" min="1" max="100" placeholder="18" required=""> <br>
							<!-- Text input para fecha de nacimiento-->

  					<label>Fecha de nacimiento.</label>  <br>
  					<input id="fecha_nac" name="fecha_nac" type="date"  min="1910-01-01" max="2015-01-01" required=""><br>


							<!-- Text inputpara seleccionar Sexo-->					
    								<label>Sexo</label> <br>
    								<select name="sexo" id="sexo">
    								<option value=""></option>
    								<option value="masculino">Masculino</option>
    								<option value="femenino">Femenino</option>
    								<option value="otro">Otro</option>
    								</select>
    								<br>
 			<!-- Text inputpara seleccionar Alergias-->	
    				<label>Enfermedades cronicas:</label> 
    				<br>
    				<textarea name="enfermedades_cronicas"  rows="3" cols="40"  placeholder="Enfermedad 3" required=""></textarea><br>
    							
							<!-- Text inputpara seleccionar Alergias-->	
    				<label>Alergias:</label>  
 					<br>
 					<textarea  name="alergias" rows="3" cols="40"  placeholder="Polvo" required=""></textarea>
 					<br>
 					<!-- Text inputpara seleccionar Alergias-->	
    				<label>Localidad origen:</label>  <br>
 					<input name="localidad_origen" type="text" placeholder="Tuxpan Nayarit" required=""> <br>


 					<!-- Text inputpara seleccionar Direccion-->	
    				<label>Direccion:</label>  <br>
 					<input name="direccion" type="text" placeholder="Manuel uribe" required=""> <br>

 					<!-- Text inputpara seleccionar Direccion-->	
    				<label>Telefono:</label>  <br>
 					<input name="telefono"   type="number"  placeholder="319101010" required=""> <br>


 					<!-- Text inputpara seleccionar Direccion-->	
    				
				<input class="boton" type="submit"  value="| Registrar |"> <!-- Boton -->

</form>
</div>


			</section>
						<section id="section-tzoid-3"><!-- buscador-->
							<center> 
							Buscar
							<input type="text" id="bus" name="bus" onkeyup="loadXMLDoc()" required />

							<div id="myDiv"></div>

							</center>





						</section>
						


						<section id="section-tzoid-5">
					<a href="connectar/paciente/m_paciente.php"><input type="submit" class="boton" value="Ver paciente"></a> 
					<br>
					<a href="connectar/servicio/m_servicio.php"><input type="submit" class="boton" value="Ver Servicios"></a>
					<br>
					<a href="connectar/material/m_material.php"><input type="submit" class="boton" value="Ver Material"></a>
<br>
					<a href="connectar/historial_paciente/m_historial_paciente.php"><input type="submit" class="boton" value="Ver Historil de pacientes"></a>
						</section>

					</div><!-- /content -->
				</div><!-- /tabs -->
			
			</section>
	
			<!-- Related demos -->
		
		</div><!-- /container -->
		<script src="js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
	</body>
</html>