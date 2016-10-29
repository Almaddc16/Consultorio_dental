<?php
include('../conexion.php')
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de operacion.</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
<div class="panel panel-warning">
  <div class="panel-body">
 <h1>Clientes</h1>
  </div>
  <div class="panel-footer">
<?php
//configuracion de la conexion a la base de datos


//consulta todos los datos
$sql = mysql_query("SELECT COUNT(sintomas)AS'num', sintomas FROM `historial_paciente`
GROUP by sintomas", $Mysql);
?>

<table border="0" class="table">
<tr> <!-- Esto es una fila -->
<td>cantidades</td> <!-- esto es una columna -->
<td>Sintomas</td> <!-- esto es una columna -->

<?php
while($row = mysql_fetch_array($sql)){
  echo "<tr>";
  echo "<td>".$row['count(sintomas)']."</td>";
  echo "<td>".$row['sintmas']."</td>";

  echo "</tr>";

}
?>
</table>
</div>


</div>
</section>

<fieldset>


</fieldset>

</div>
</div>
</div>
</body>
</html>
