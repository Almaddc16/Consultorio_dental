<?php
    include('conn.php');
?>
<!doctype html lang="es">
<html>
<head>
	<title>Consulta Productos</title>
	<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css" />
	<script  type="text/javascript" src="../../../bootstrap/js/bootstrap.js"></script>
	
	</head>
	<body>
	<DIV class="container">
		<div class="page-header">
  <h1>Adeudos <small></small></h1>
</div>


<div class="page-header">
	<a href="../../../index.html"><button class="btn btn-primary" type="button">
 Ir a Inicio <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
<a href="adeudos_pdf.php"><button class="btn btn-primary" type="button">
 Imprimir esta informacion <span class="btn-lg glyphicon glyphicon-th"></span>
</button>
</a>
</div>
			
			<?php
		/*configuracion de la base de datos*/
		$db = mysql_select_db("consultorio_dental", $link);

		/*consulta todos los datos*/
		$sql = mysql_query("SELECT paciente.nombre, paciente.apellidos, adeudos.adeudo, adeudos.t_pagar 
			FROM `adeudos` INNER JOIN paciente on paciente.pk_paciente=adeudos.pk_adeudos", $link);
		?><div class="tabla">
	
		<div>
			<table border="1" class="table table-striped">
				<tr><!-- Esto es una fila-->

					<td>Nombre</td><!-- Esto es una columna-->
					<td>Apellido</td><!-- Esto es una columna-->
					<td>Adeudo</td><!-- Esto es una columna-->
					<td>De:</td><!-- Esto es una columna-->

				
				</tr>
				<?php
				//Extraer los campos de la tabla
				while($row = mysql_fetch_array($sql)){
					echo "<tr>";
					
					echo "<td>".$row['nombre']."</td>";
					echo "<td>".$row['apellidos']."</td>";


					echo "<td>".$row['adeudo']."</td>";
					echo "<td>".$row['t_pagar']."</td>";

					//echo "<td>".$row['NCATEGORIA']."</td>";
					/*echo "<td><a href=eliminar.php?borrapofavo=".$row['IDCATEGORIA']." "; ?>onclick="return confirm('¿En verdad deseas eliminar este registrro?','Confirma')" <?php echo ">Eliminar</a></td></td>";
					echo "<td><a href=modificar.php?modificapofavo=".$row['IDCATEGORIA']." "; ?>onclick="return confirm('¿En verdad deseas modificar este registro?','Confirma')" <?php echo ">Modificar</a></td></td>";
					*/echo "</tr>";
				}
				?>
			</table>
		</div>
		<p align="center"><br>
			<?php
			/*Consulta para encontrar el numero de registros en la base de datos*/
			$query = mysql_query("SELECT * FROM adeudos");
			$no_rows = mysql_num_rows($query);
			?>
		</p>
		<p align="center">
			NúMERO DE REGISTROS: <?php echo $no_rows; ?>
		</p>
		
	</div>
		</DIV>

</body>
</body>
</html>
