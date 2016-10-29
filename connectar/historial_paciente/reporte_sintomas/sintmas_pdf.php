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
$pdf->SetFont("Arial", "b", 12);
$pdf->Cell(40,10,'Sintomas mas frecuentes:',  0,'C');

//mostrar
$pdf->Ln();
$sql="SELECT COUNT(sintomas)AS'num', sintomas FROM historial_paciente
GROUP by sintomas";
$rec=mysql_query($sql);
while ($row=mysql_fetch_array($rec)) {

//datos de coneccion
	$pdf->Cell(40, 10, $row['sintomas'],1,1,'C');


	
}

$pdf->Output();	
 ?>