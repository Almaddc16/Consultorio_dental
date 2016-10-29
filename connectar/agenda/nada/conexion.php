<?php
$hostname_Mysql = "localhost";
$database_Mysql = "consultorio_dental";
$username_Mysql = "root";
$password_Mysql = "";

mysql_set_charset('utf8');
$Mysql = mysql_connect($hostname_Mysql, $username_Mysql, $password_Mysql) or die (mysql_error());
//mysql_select_db($database_Mysql, $Mysql);

mysql_query("SET NAMES 'utf8'");
?>