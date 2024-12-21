<?php
 session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'conexion.php';


$cliente = $_GET['usuarios'];
$modulo = $_GET['docentes'];



if ($_SESSION['Usuario_Nombre']==$cliente && $_SESSION['Id_docentes']==$modulo) {
$cl = $cliente;
include ('../../../funciones/conexion.php');

$sql1 = "SELECT Nombre FROM docentes WHERE Id = '$cl'";
$rs1 = mysql_query($sql1,$con);
if ($row = mysql_fetch_array($rs1)) {
    
    $modulo = $row['Nombre'];
}
$rut = $_SESSION['rut'];
$nomc = $_SESSION['nomc'];
}else{
header('Location:../constancia.php');
}

require('fpdf.php');


class PDF extends FPDF{

    function Header(){

        //logo
        $this->Image('color.png',78,15,60);
        //ARIAL BOLD 15
        $this->SetFont('Arial','B',20);
        //Movernos a la Derecha
        $this->Cell(80);
        //titulo
        $this->Cell(30,100,'CERTIFICACIÓN ROA-METALES',0,0,'C');
        //Salto de Linea
        $this->Ln(20);
        //subtitulo
        $this->SetFont('Arial','B',14);
        //Movernos a la Derecha
        $this->Cell(80);
        //titulo
        $this->Cell(30,80,utf8_decode('Modulo Soldadura TIC'),0,0,'C');
        //Salto de Linea
        $this->Ln(20);
    }
    function Footer(){
        //posicion a 1,5 cm del final
        $this->SetY(-15);
        //Arial Italic 8
        $this->SetFont('Arial','B',8);
        //Numero de Pagina
        $this->Rect(7,283,196,7);
        $this->Cell(170,10,'www.roametales.cl',0,0,'C');
        $this->SetFont('Arial','I',8);
        $this->Cell(20,10,'Pagina '.$this->PageNo().'de 1',0,0,'');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Rect(7,7,196,283);
$pdf->SetFont('Arial','',12);
$pdf-> ln(50);
$pdf->Write(6,'El  Ministerio  de Educación en  común  acuerdo  con  la  empresa certificadora  otorga  el presente  certificado  a  don(ña)  '.$nomc.', RUN  '.$rut.', quien ha cursado  el  modulo  de  '.$modulo.',  año  2015, en  el  establecimiento  certificador  de  capacidades conocimientos  y  habilidades  OTEC  ROA-METALES,  comuna  de  RANCAGUA,  Región Del Lib. B. O Higgins, obteniendo los siguientes resultados:');
$pdf-> ln(10);
$pdf->Cell(43,6,'Promedio General :',0);
$pdf->SetFont('Arial','B',12);

$pdf-> ln(7);
$pdf->SetFont('Arial','',12);
$pdf->Cell(43,6,'Situacion Final :',0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(75,6,'Es Certificado En '.$modulo.'',0);
$pdf-> ln(70);
$pdf->Image('timbre.png',60,180,100);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Jessica Padilla U.',0,0,'C');
$pdf-> ln();
$pdf->Cell(0,6,'Coordinadora',0,0,'C');
$pdf-> ln();
$pdf->Cell(0,6,'Unidad Nacional de Registro Curricular',0,0,'C');
$pdf-> ln(12);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,'Codigo de Verificacion:',0,0,'R');
$pdf-> ln();
$pdf->Cell(0,5,'',0,0,'R');
$pdf-> ln(12);
$pdf->SetFont('Arial','',9);
$pdf->Cell(90,4,'',0);
$pdf->Cell(103,4,'La validez de este documento  está dada por su código de  verificación',0,0,'');
$pdf-> ln();
$pdf->Cell(90,4,'Fecha de Emisión: '.date('d-m-Y').'',0,0,'');
$pdf-> ln();
#Establecemos el margen inferior: 
$pdf->SetAutoPageBreak(true,5); 

// Segunda página

$pdf->SetFontSize(14);

$pdf->Output();
?>
