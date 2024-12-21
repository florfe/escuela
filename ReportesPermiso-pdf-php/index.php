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
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(8,10,'PERMISO DE EXAMEN',0,1,'C');
    $this->SetFont('Arial','B',11);
    $this->Cell(130,3,utf8_decode('IPEM Nº 123 -BLANCA ETCHEMENDY'),0,1,'C');
    // Salto de línea
    $this->Ln(5);
}

// Pie de página
function Footer()
{
 //Posición: a 1,5 cm del final
  $this->SetY(-15);
 //Arial italic 8
$this->SetFont('Arial','I',8);
 //Número de página
$this->Cell(50,-5,utf8_decode('SELLO '),0,0,'C');
$this->Cell(50,-5,utf8_decode('Firma Secretaria '),0,0,'R');

}
}


$pdf = new PDF('P','mm','A5');
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial','',9);

 
$pdf->Cell(120,7,utf8_decode('Conste por la presente que  el alumno '.$_SESSION['Alumno_Apellido'].', '.$_SESSION['Alumno_Nombre'].'   DNI Nº: '.$_SESSION['Alumno_NumeroDni'] ),0,1,'C',0);
$pdf->Cell(120,7,utf8_decode('esta habilitado para rendir las asignaturas correspondientes al'),0,1,'C',0);
$pdf->Cell(120,7,utf8_decode(''.$_SESSION['Alumno_Curso'].'  año de estudios que se  indican a continuacion, lo que hizo en fechas  señaladas.'),0,1,'C',0);

$pdf->Cell(10,7,utf8_decode('Nº '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode('Asignaturas'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Fecha'),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode('Calificacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode('Firma'),1,1,'C',0);

$consulta="SELECT ex.Id as ID, ex.IdAlumnos, ex.Mesa, ex.Curso, ex.Materias,
alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, prev.Curso as curso, prev.Materia, prev.Fecha
 FROM  examen as ex, alumnos as alum, previas prev 
 where ex.IdAlumnos=alum.Id and ex.Curso=prev.Curso and  prev.Materia=ex.Materias
";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']==$row['Curso'] )) {

//for($i=0; $i<10; $i++){ 
$pdf->Cell(10,7,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode($row['Materia']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['Fecha']),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(''),1,1,'C',0);
}}
$pdf->Ln(5);
$pdf->Cell(100,7,utf8_decode('Cordoba, dia de mes de año' ),0,1,'R',0);
$pdf->Cell(100,7,utf8_decode('Notas:' ),0,1,'L',0);
$pdf->Cell(100,7,utf8_decode('1) Para poder rendir el alumno deberá presentar a la mesa examinadora' ),0,1,'L',0);
$pdf->Cell(100,7,utf8_decode('este permiso y su documento de identidad.' ),0,1,'L',0);
$pdf->Cell(100,7,utf8_decode('2) Los examenes escritos deben ser hechos con tinta.' ),0,1,'L',0);
$pdf->Ln(20);

$pdf->Output('Permiso.pdf', 'I');
?>