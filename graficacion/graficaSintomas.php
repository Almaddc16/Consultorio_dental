<?php
include('open_flash_chart2/php-ofc-library/open-flash-chart.php');
class graficaEmpleado {
public function conectar() {
if (!($con = @mysql_connect("localhost", "root", ""))) {
echo"Error al conectar a la base de datos";
exit();
}
if (!@mysql_select_db("consultorio_dental", $con)) {
echo "Error al seleccionar la base de datos";
exit();
}
$this->conect = $con;
return true;
}
// consulta los empleados de la BD
public function consulta() {
//usamos el metodo conectar para realizar la conexion
if ($this->conectar() == true) {
$query = "SELECT COUNT(sintomas) AS sintomas_recientes, sintomas
FROM historial_paciente GROUP BY Sintomas";
$result = @mysql_query($query);
if (!$result)
return false;
else
return $result;
}
}
public function graficaPorDepartamento() {
$label = array();
$data = array();
$consulta = $this->consulta();
while ($row = mysql_fetch_array($consulta)) {
#almacenamos los registros en arrays
$label[] = $row['sintomas'];
$data[] = intval($row['sintomas_recientes']);
}
$max = max($data);
$max = floor($max / 10) * 10 + 10;
// definimos el titulo
$title = new title('Sintomas mas recientes en los pacientes');
// definimos los estilos para el texto titulo
$title->set_style('{font-size: 16px; color: #000;font-weight:bold;}');
$animation = 'pop';
$delay = 0.1;
$cascade = 0.5;
//tipo de gráfica, en este caso forma de cilindro
$bar = new bar_cylinder();
$bar->colour('#0033ff');
//definicion del texto para la leyenda del grafico
//$bar->key('DEPARTAMENTOS', 12);
//asignamos los datos
$bar->set_values($data);
//definimos el texto para el tooltip
$bar->set_tooltip("TOTAL: #val# Sintomas");
$bar->set_on_show(new bar_on_show($animation, $cascade, $delay));
//instanciamos un objeto de la clase open_flash_chart
$chart = new open_flash_chart();
$chart->set_title($title);
//definimos configuraciones para las etiquetas del eje x
$x_labels = new x_axis_labels();
$x_labels->set_vertical();
$x_labels->set_labels($label);
$x_labels->rotate(50);
//asignamos configuraciones para las etiquetas del eje x
$x_axis = new x_axis();
$x_axis->set_labels($x_labels);
//asignamos configuraciones para las etiquetas del eje xy
$y = new y_axis();
$y->set_range(0, $max, 10);
$y_legend = new y_legend('CANTIDAD DE SINTOMAS MAS RECIENTES');
$y_legend->set_style('{font-size: 12px; color: #000}');
$chart->set_y_legend($y_legend);
//definicion y configuracion de las etiquetas de las barras
$tags = new ofc_tags();
$tags->font("Verdana", 15)
->colour("#000000")
->align_x_center()
->style(true, false, false, 1)
->text('#y#');
$x = 0;
foreach ($data as $v) {
$tags->append_tag(new ofc_tag($x, $v));
$x++;
}
$chart->set_x_axis($x_axis);
$chart->set_y_axis($y);
$chart->add_element($bar);
$chart->add_element($tags);
$chart->set_bg_colour('#FFFFEE');
return $chart->toString();
}

}

?>

