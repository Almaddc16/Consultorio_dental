<?php 
 $host = "localhost";
 $user = "root";
 $pass ="";
 $bd = "consultorio_dental";
 $conn = new mysqli($host, $user, $pass, $bd) or die ("error" . mysqli_errno($conn));

?>