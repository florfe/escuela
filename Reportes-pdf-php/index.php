<?php
 session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }
  require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

require('fpdf/fpdf.php');
require_once 'funciones/dni_loguin.php'; 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{        	
    // Logo
    $this->Image('img/logo.png',20,3,160);
     // Salto de línea
    $this->Ln(15);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,40,'Constancia  General',0,0,'C');
    // Salto de línea
    $this->Ln(30);
}

// Pie de página
function Footer()
{
 //Posición: a 1,5 cm del final
  $this->SetY(-15);
 //Arial italic 8
$this->SetFont('Arial','I',8);
 //Número de página
$this->Cell(0,-40,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
// Logo
   $this->Image('img/logo.png',20,270,160);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);


$pdf->Cell(100,10,utf8_decode('IPEM Nº 123 - Blanca Etchemndy'),0,1,'C',0);

$pdf->Cell(200,10,'Se hace constar que el/la Sr./a  '.$_SESSION['Docente_Apellido'].', '.$_SESSION['Docente_Nombre'].'  '.utf8_decode('D.N.I. Nº: ').$_SESSION['Docente_NumeroDni'],0,1,'C',0);

$pdf->Cell(170,10,utf8_decode('se desempeña en esta institucion en el cargo de Profesor/a. '),0,1,'C',0);
$pdf->Cell(185,10,utf8_decode('Se extiende la presente en Còrdoba, a los ').date('d').utf8_decode(' dìas del mes ').date('m'),0,1,'C',0);
$pdf->Cell(170,10,utf8_decode('del año ').date('Y').utf8_decode(', para ser presentado ante quien corresponda. '),0,0,'C',0);
 $pdf->Image('img/firma.png' , 100 , 110 , 55);

$pdf->Output();
?>