<html>
<head>
	<title>chec box</title>
</head>
<body>
	<?php 
		mysql_connect('localhost','root','');
		mysql_select_db('consultorio_dental') or die(mysql_error());
	 ?>
	 paso 1:
	 <form action="sumar.php" method="POST">
	 Fk:	<input name="fk" type="number">
	 <table>
 		<caption>Lista de servicios</caption>
		<th>id |</th>
		<th>nombre |</th>
		<th>costo |</th>
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


	 </form>
</body>
</html>