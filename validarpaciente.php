<?php
 if(isset($_POST["password"])){
 $con=mysql_connect("localhost","root","");
 $base=mysql_select_db("consultorio_dental",$con);
 $consulta=mysql_query("SELECT * FROM  servicio WHERE pk_servicio='".$_POST["pk_servicio"]."' ");
 if (mysql_num_rows($consulta)>0) {
 	session_start();
 	$_SESSION['pk_servicio']=$_POST["pk_servicio"];
 	?>
 	<script type="text/javascript">
 	window.location="expediente.php";
 	a
 	</script>
 	<?php
 }
 else{
 	echo "<html>
	<head>
	</head>
	<body>
		<meta http-equiv='REFRESH' content='0 ; url=index.html'>
		<script>
			alert('Usuario o Password Incorrecto :(');
		</script>
	</body>
	</html>";

 }
}
?>
