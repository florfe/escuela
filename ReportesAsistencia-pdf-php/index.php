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
    $this->Cell(155,10,'Registro de Asistencia',0,0,'C');
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
$this->Cell(0,-10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');

}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("Landscape");


$pdf->SetFont('Arial','',9);

//materias
$pdf->Cell(20,7,utf8_decode('Ciclo: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(60,7,utf8_decode('Registro de Asistencia'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Mes: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(date('m')),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Año: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(date('Y')),1,1,'C',0);

 

$pdf->Cell(5,9,utf8_decode('Nº'),1,0,'C',0);
$pdf->Cell(55,9,utf8_decode('APELLIDO Y NOMBRE'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('1'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('2'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('3'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('4'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('5'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('6'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('7'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('8'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('9'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('10'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('11'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('12'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('13'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('14'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('15'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('16'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('17'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('18'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('19'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('20'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('21'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('22'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('23'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('24'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('25'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('26'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('27'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('28'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('29'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('30'),1,0,'C',0);
$pdf->Cell(5,9,utf8_decode('31'),1,0,'C',0);
$pdf->Cell(10,9,utf8_decode('ASIST'),1,0,'C',0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(30,3,utf8_decode('INASIT'),1,0,'C',0);
$pdf->SetY(30); /* Set 20 Eje Y */
$pdf->SetX(235);
$pdf->Cell(15,3,utf8_decode('MES'),1,0,'C',0);
$pdf->Cell(15,3,utf8_decode('AÑO'),1,0,'C',0);
$pdf->SetY(33); /* Set 20 Eje Y */
$pdf->SetX(235);
$pdf->Cell(10,3,utf8_decode('J'),1,0,'C',0);
$pdf->Cell(10,3,utf8_decode('INJ'),1,0,'C',0);
$pdf->Cell(10,3,utf8_decode('TT'),1,0,'C',0);
$pdf->SetY(27); /* Set 20 Eje Y */
$pdf->SetX(265);
$pdf->SetFont('Arial','',9);
$pdf->Cell(20,9,utf8_decode('OBSERV.'),1,1,'C',0);

 $consulta="SELECT * FROM alumnos order by Apellido ";
$resultado=mysqli_query($MiConexion, $consulta); 
   $i=1;
  if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
 if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
 if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='C'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='C'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
 if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
 if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}

 if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}

 if($_SESSION['Alumno_Curso']=='4' && $_SESSION['Alumno_Division']=='Humanidades'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='4' && $row['IdDivision']=='Humanidades'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='4' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='4' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='4' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='4' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='5' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='5' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}

 if($_SESSION['Alumno_Curso']=='5' && $_SESSION['Alumno_Division']=='Humanidades'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='5' && $row['IdDivision']=='Humanidades'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='5' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='5' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='6' && $_SESSION['Alumno_Division']=='Humanidades'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='6' && $row['IdDivision']=='Humanidades'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
if($_SESSION['Alumno_Curso']=='6' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='6' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(55,5,utf8_decode($row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,1,'C',0);
}}}
$pdf->Output('LibretaAlumno.pdf', 'I');
?>