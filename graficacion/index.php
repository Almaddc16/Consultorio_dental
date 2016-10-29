<?php
include_once("graficaSintomas.php");
$obj = new graficaEmpleado();
$chart = $obj->graficaPorDepartamento();
#https://enboliviacom.wordpress.com/2012/09/12/open-flash-chart-2-con-php-y-mysql/
?>
<html>
<head>
<script type="text/javascript" src="open_flash_chart2/js/json/json2.js"></script>
<script type="text/javascript" src="open_flash_chart2/js/swfobject.js"></script>
<script type="text/javascript">
swfobject.embedSWF(
"open_flash_chart2/open-flash-chart.swf", "div_chart",
"620", "460", "9.0.0", "expressInstall.swf");
</script>
<script type="text/javascript">
function open_flash_chart_data(){
return JSON.stringify(data);
}
var data = <?php echo $chart; ?>;
</script>
</head>
<body>
<!--<h1>EMPLEADOS</h1>-->
<div id="div_chart"></div>
</body>
</html>