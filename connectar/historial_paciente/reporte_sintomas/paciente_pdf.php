<?php 

require "../fpdf.php";
/**
* 
*/
$pk_paciente=$_GET['pk_paciente'];

class PDF extends FPDF
{
}
//decalaramos la hora.
$pdf=new PDF ('P','mm', 'Letter');
$pdf->SetMargins(20,30);
$pdf->AliasNbPages();
$pdf->AddPage();
//datos del Titulo
mysql_connect("localhost","root","");
mysql_select_db("consultorio_dental");



//mostrar
$pdf->Ln();
$sql="SELECT * FROM paciente where pk_paciente='$pk_paciente'";
$rec=mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {
	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 15);
$pdf->Cell(0,5,'Consultorio dental', 0, 1,'C');
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(0,5,'Datos personales', 4, 1,'C');




//datos de coneccion
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Num de expediente:',  1,'C');

	
	$pdf->Cell(60, 5, $row['pk_paciente'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Nombre:',  1,'C');

	
	$pdf->Cell(60, 5, $row['nombre'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Apellidos:',  1,'C');




	$pdf->Cell(60, 5, $row['apellidos'],1,1,'C');



	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Curp:',  1,'C');

	
	$pdf->Cell(60, 5, $row['curp'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'edad:',  1,'C');
	$pdf->Cell(60, 5, $row['edad'],1,1,'C');

	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Fecha de nacimiento:',  1,'C');

	
	$pdf->Cell(60, 5, $row['fecha_nac'],1,1,'C');


$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Sexo:',  1,'C');
	$pdf->Cell(60, 5, $row['sexo'],1,1,'C');


$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'enfermedades_cronicas:',  1,'C');
	$pdf->Cell(60, 5, $row['enfermedades_cronicas'],1,1,'C');

	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'alergias:',  1,'C');
	$pdf->Cell(60, 5, $row['alergias'],1,1,'C');

	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'localidad_origen:',  1,'C');
	$pdf->Cell(60, 5, $row['localidad_origen'],1,1,'C');

	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'direccion:',  1,'C');
	$pdf->Cell(60, 5, $row['direccion'],1,1,'C');
	
	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'telefono:',  1,'C');
	$pdf->Cell(60, 5, $row['telefono'],1,1,'C');






	
}
$pdf->Ln();
$sql="SELECT * FROM `historial_paciente` where fk_paciente='$pk_paciente'";
$rec=mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {
	
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(0,5,'Consultas', 4, 1,'C');




//datos de coneccion

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'fecha de consulta:',  1,'C');

	$pdf->Cell(60, 5, $row['fecha_consulta'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Sintomas:',  1,'C');

	
	$pdf->Cell(60, 5, $row['sintomas'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Reseta:',  1,'C');

	
	$pdf->Cell(60, 5, $row['receta'],1,1,'C');


	
}
$pdf->Ln();
$sql="SELECT paciente.nombre, paciente.apellidos, adeudos.adeudo, adeudos.t_pagar 
			FROM `adeudos` INNER JOIN paciente on paciente.pk_paciente=adeudos.pk_adeudos where fk_paciente='$pk_paciente' ";
$rec=mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(0,5,' Adeudos', 4, 1,'C');



	
//datos de coneccion

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Nombre:',  1,'C');

	
	$pdf->Cell(60, 5, $row['nombre'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Apellidos:',  1,'C');



	$pdf->Cell(60, 5, $row['apellidos'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Debe:',  1,'C');



	$pdf->Cell(60, 5, $row['adeudo'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'De la cantidad de::',  1,'C');



	$pdf->Cell(60, 5, $row['t_pagar'],1,1,'C');

	
}
$pdf->Output();	
 ?>