<?php 

require "../fpdf.php";
/**
* 
*/

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


	$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 15);
$pdf->Cell(0,5,'Consultorio dental', 0, 1,'C');
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(0,5,'Adeudos de los pacientes:', 4, 1,'C');


//mostrar
$pdf->Ln();
$sql="SELECT paciente.nombre, paciente.apellidos, adeudos.adeudo, adeudos.t_pagar 
			FROM `adeudos` INNER JOIN paciente on paciente.pk_paciente=adeudos.pk_adeudos ";
$rec=mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {

$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);
$pdf->Cell(0,5,' ', 4, 1,'C');



	
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