
<?php
$link = mysql_connect("localhost","root",""); 
mysql_set_charset('utf8');
mysql_query("SET NAMES 'utf8'");
if($link){
	mysql_select_db("consultorio_dental", $link);

}


?>