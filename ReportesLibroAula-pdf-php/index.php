<?php
 session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }
  require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

require('fpdf/fpdf.php');
require_once 'funciones/dni_loguin2.php'; 
//require_once 'funciones/dni_loguin.php'; 
class PDF extends FPDF
{
// Cabecera de página

function Header()
{        	
   if ($this->PageNo() != 2){
     
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    
    // Título
    $this->Cell(270,5,utf8_decode('Profesor/a Titular: ').$_SESSION['Docente_Apellido'].', '.$_SESSION['Docente_Nombre'],0,1,'L');
    $this->Cell(270,5,utf8_decode('Profesor/a Suplente:                       '),0,1,'L');
    $this->Cell(270,5,utf8_decode('Profesor/a Provisorio: '),0,1,'L');

    $this->Ln(6);
     $this->Cell(170,5,utf8_decode('Espacio curricular: ').$_SESSION['Docente_Materias'],0,0,'C');
    
    }
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(6);
$pdf->Cell(10,15,utf8_decode('Dia'),1,0,'C',0);
$pdf->Cell(10,15,utf8_decode('Mes'),1,0,'C',0);
$pdf->Cell(10,15,utf8_decode('Año'),1,0,'C',0);
$pdf->Cell(16,15,utf8_decode('Clase Nº'),1,0,'C',0);
$pdf->MultiCell(18,5,utf8_decode('Eje Tematico Nº'),1,'C',0);
$pdf->SetY(37); /* Set 20 Eje Y */
$pdf->SetX(74); 
$pdf->MultiCell(18,7.5,utf8_decode('Formato Curricular'),1,'C',0);
$pdf->SetY(37); /* Set 20 Eje Y */
$pdf->SetX(92); 
$pdf->MultiCell(106,15,utf8_decode('Contenidos Prioritarios'),1,'C',0);
$i=23;
for($i=0 ; $i<22; $i++){
$pdf->Cell(10,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(16,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(18,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(18,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(106,10,utf8_decode(' '),1,1,'C',0);
}

$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->Cell(270,5,utf8_decode('Horario - ').$_SESSION['Docente_Curso'].', '.$_SESSION['Docente_Division'].', '.$_SESSION['Docente_Turno'],0,1,'L');
    $pdf->Cell(20,5,utf8_decode('Lunes'),1,0,'L');
    $pdf->Cell(20,5,utf8_decode('Martes'),1,0,'L');
    $pdf->Cell(20,5,utf8_decode('Miercoles'),1,0,'L');
    $pdf->Cell(20,5,utf8_decode('Jueves'),1,0,'L');
$pdf->Cell(20,5,utf8_decode('Viernes'),1,0,'L');
$pdf->Cell(70,5,utf8_decode('Folio Nº: '),0,1,'R');
$pdf->Cell(20,10,utf8_decode(''),1,0,'L');
    $pdf->Cell(20,10,utf8_decode(''),1,0,'L');
    $pdf->Cell(20,10,utf8_decode(''),1,0,'L');
    $pdf->Cell(20,10,utf8_decode(''),1,0,'L');
$pdf->Cell(20,10,utf8_decode(''),1,1,'L');
    $pdf->Ln(6);

$pdf->Cell(120,15,utf8_decode('Contenidos Prioritarios'),1,0,'C',0);

 
 $pdf->MultiCell(18,7.5,utf8_decode('Firma del Profesor'),1,'C',0);
 $pdf->SetY(36); /* Set 20 Eje Y */
$pdf->SetX(148);
$pdf->MultiCell(26,7.5,utf8_decode('Observaciones '),1,'C',0);
 $pdf->SetY(36); /* Set 20 Eje Y */
$pdf->SetX(174);
$pdf->MultiCell(24,5,utf8_decode('Firma de la autoridad que visito la clase'),1,'C',0);

$i=23;
for($i=0 ; $i<22; $i++){
$pdf->Cell(120,10,utf8_decode(''),1,0,'C',0);
 $pdf->Cell(18,10,utf8_decode(''),1,0,'C',0);
$pdf->Cell(26,10,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(24,10,utf8_decode(' '),1,1,'C',0);

 }
$pdf->Ln(6);

$pdf->Output();
?>