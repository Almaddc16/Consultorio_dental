<?php 

require "fpdf.php";
/**
* 
*/
$codigo=$_GET['pk_historial'];

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
$sql="SELECT paciente.nombre, paciente.apellidos, historial_paciente.sintomas,historial_paciente.receta,historial_paciente.fecha_consulta
 FROM `historial_paciente` INNER JOIN paciente on paciente.pk_paciente=historial_paciente.fk_paciente where pk_historial='$pk_historial'";
$rec=mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {
	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 15);
$pdf->Cell(0,5,'Consultorio dental', 0, 1,'C');
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(0,5,'Reseta', 4, 1,'C');




	$pdf->Cell(0, 5, $row['fecha_consulta'],1,1,'C');
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
$pdf->Cell(40,5,'Sintomas:',  1,'C');



	$pdf->Cell(60, 5, $row['sintomas'],1,1,'C');

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(40,5,'Se reseta:',  1,'C');

	$pdf->Cell(60, 5, $row['receta'],1,1,'C');
	
}

$pdf->Output();	
 ?>