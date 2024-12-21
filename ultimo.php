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
    $this->Cell(155,10,'Libreton',0,0,'C');
    // Salto de línea
    $this->Ln(10);
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

}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("Landscape");


$pdf->SetFont('Arial','',9);
 $consulta="SELECT * FROM alumnos order by Apellido ";
$resultado=mysqli_query($MiConexion, $consulta); 
   
  if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){

while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Mañana')) {

$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,1,'C',0);

$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,1,'C',0);

$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,1,'C',0);

$i=15;
for($i=0 ; $i<14; $i++){
$pdf->Cell(55,7,utf8_decode('Espacio curricular'),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacio curricular'),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,1,'C',0);
}

$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,1,'L',0);

$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,1,'L',0);

$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,1,'L',0);

$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,1,'L',0);

$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,0,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);

$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Ln(20);
}}}
$pdf->Output('LibretaAlumno.pdf', 'I');
?>