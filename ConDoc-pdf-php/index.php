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

class PDF extends FPDF
{
// Cabecera de página
function Header()
{        	
     // Salto de línea
    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','',11);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    $this->Cell(70,5,utf8_decode('GOBIERNO DE LA PROVINCIA DE CÓRDOBA'),0,1,'Lo');
    $this->Cell(10);
  $this->Cell(70,5,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'Lo');
  $this->Cell(10);
  $this->Cell(70,5,utf8_decode('SECRETARÍA DE EDUCACIÓN'),0,1,'Lo');
  $this->Cell(10);
  $this->Cell(70,5,utf8_decode('DIRECCIÓN GENERAL DE EDUCACIÓN MEDIA'),0,0,'Lo');
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
 //Posición: a 1,5 cm del final
  $this->SetY(-10);
 //Arial italic 8
$this->SetFont('Arial','I',8);
 //Número de página
$this->Cell(10);
$this->Cell(0,-15,utf8_decode('Firma del/la interesado/a'),0,0,'Lo');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(200,5,utf8_decode('I.P.E.M. Nº 123 "BLANCA ETCHEMENDY"'),0,1,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(200,5,utf8_decode('C. Ibarra esquina Cosquín - Bº Villa El Libertador'),0,1,'C',0);
$pdf->Cell(200,5,utf8_decode('Córdoba Capital'),0,1,'C',0);
 $pdf->Ln(7);
 $pdf->Cell(10);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(170,12,utf8_decode('FICHA DE CONCEPTO DEL PERSONAL DOCENTE AÑO '.date('Y')),1,1,'C',0);
 $pdf->Ln(7);
 $pdf->SetFont('Arial','',12);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('APELLIDO Y NOMBRE:   '.$_SESSION['Docente_Apellido'].', '.$_SESSION['Docente_Nombre']),0,1,'Lo',0);
$pdf->Ln(3);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('DNI Nº:   '.$_SESSION['Docente_NumeroDni']),0,0,'Lo',0);
$pdf->Cell(85,5,utf8_decode('LEGAJO:   '.$_SESSION['Docente_Legajo']),0,1,'Lo',0);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('DOMICILIO:   '.$_SESSION['Docente_Calle'].' '.$_SESSION['Docente_Numero'].' '.$_SESSION['Docente_Piso'].' '.$_SESSION['Docente_Departamento'].' '.$_SESSION['Docente_Barrio']),0,1,'Lo',0);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('TITULO:   '.$_SESSION['Docente_Titulo']),0,1,'Lo',0);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('FECHA DE ESCALAFÓN:   '.$_SESSION['Docente_Escalafon']),0,1,'Lo',0);


$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('MATERIAS QUE DICTA:   '.$_SESSION['Docente_Materias']),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',16);
$resta=date('Y')-1;
$pdf->Cell(170,12,utf8_decode('CONCEPTO CORRESPONDIENTE AL AÑO '.$resta),0,1,'C',0);

$pdf->Ln(3);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('1)  Preparación Profesional (actualización, superación, cultura general)'),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('Concepto: '.$_SESSION['Docente_Conceptos1']),0,0,'Lo',0);
$pdf->Cell(85,5,utf8_decode('Puntos: '.$_SESSION['Docente_Puntos1']),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('2)  Aptitudes Docentes (disciplinares, de trabajo de conducción, de comunicación, '),0,1,'Lo',0);
$pdf->Cell(15);
$pdf->Cell(170,5,utf8_decode('Formación y orientación)'),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('Concepto: '.$_SESSION['Docente_Conceptos2']),0,0,'Lo',0);
$pdf->Cell(85,5,utf8_decode('Puntos: '.$_SESSION['Docente_Puntos2']),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('3)  Preparación Profesional (actualización, superación, cultura general)'),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('Concepto: '.$_SESSION['Docente_Conceptos3']),0,0,'Lo',0);
$pdf->Cell(85,5,utf8_decode('Puntos: '.$_SESSION['Docente_Puntos3']),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('4)  Preparación Profesional (actualización, superación, cultura general)'),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('Concepto: '.$_SESSION['Docente_Conceptos4']),0,0,'Lo',0);
$pdf->Cell(85,5,utf8_decode('Puntos: '.$_SESSION['Docente_Puntos4']),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('5)  Preparación Profesional (actualización, superación, cultura general)'),0,1,'Lo',0);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('Concepto: '.$_SESSION['Docente_Conceptos5']),0,0,'Lo',0);
$pdf->Cell(85,5,utf8_decode('Puntos: '.$_SESSION['Docente_Puntos5']),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10);
$pdf->Cell(100,5,utf8_decode('CONCEPTO GENERAL: '.$_SESSION['Docente_ConceptoGeneral']),0,0,'Lo',0);

$suma=$_SESSION['Docente_Puntos4']+$_SESSION['Docente_Puntos5']+$_SESSION['Docente_Puntos3']+$_SESSION['Docente_Puntos2']+$_SESSION['Docente_Puntos1'];
$pdf->Cell(85,5,utf8_decode('Puntos: '.$suma),0,1,'Lo',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10);
$pdf->Cell(170,5,utf8_decode('Lugar y Fecha: Córdoba,  '.date('d/m/Y')),0,0,'Lo',0);
$pdf->Cell(50);
$pdf->Image('img/firma.png' , 110 , 248 , 65);

$pdf->Output();
?>