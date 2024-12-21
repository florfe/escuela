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
function Header()
{         
    $this->SetFont('Arial','B',14);
    $this->Cell(60);
    $this->Cell(8,10,'ACTA VOLANTE DE EXAMEN COLOQUIO',0,1,'C');
    $this->SetFont('Arial','B',11);
    $this->Cell(130,3,utf8_decode('IPEM Nº 123 -BLANCA ETCHEMENDY'),0,1,'C');
    $this->Ln(5);
}
function Footer()
{
$this->SetY(-45);
$this->Cell(60,5,utf8_decode('Presidente: '.$_SESSION['Alumno_Apellido'].', '.$_SESSION['Alumno_Nombre'] ),0,1,'L',0);
$this->Cell(45,5,utf8_decode('Vocal: ------' ),0,0,'L',0);
$this->Cell(45,5,utf8_decode('Vocal: ------ ' ),0,0,'L',0);
$this->Cell(45,5,utf8_decode('Vocal: ------ ' ),0,1,'L',0);
$this->Cell(45,5,utf8_decode('Aprobados:         '),0,0,'L',0);
$this->Cell(45,5,utf8_decode('Aplazados:       ' ),0,0,'L',0);
$this->Cell(45,5,utf8_decode('Ausentes:       ' ),0,1,'L',0);
$this->Cell(120,5,utf8_decode('Fecha: '.$_SESSION['Alumno_Fecha']),0,1,'L',0);
$this->SetY(-7);
$this->SetFont('Arial','I',8);
$this->Cell(50,-5,utf8_decode('SELLO '),0,0,'C');
$this->Cell(50,-5,utf8_decode('Firma Secretaria '),0,0,'R');
}
}
$pdf = new PDF('P','mm','A5');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$pdf->Cell(60,7,utf8_decode('Exámenes de alumnos REGULARES' ),0,0,'L',0);
$pdf->Cell(30,7,utf8_decode('Libro ' ),0,0,'L',0);
$pdf->Cell(30,7,utf8_decode('Folio ' ),0,1,'C',0);
$pdf->Cell(60,7,utf8_decode('Asignatura: '.$_SESSION['Alumno_Materia']),0,0,'L',0);
$pdf->Cell(20,7,utf8_decode('Año: '. $_SESSION['Alumno_Curso']),0,0,'L',0);
$pdf->Cell(20,7,utf8_decode('Div: '.$_SESSION['Alumno_Division']),0,0,'L',0);
$pdf->Cell(20,7,utf8_decode('Turno: '.$_SESSION['Alumno_Turno']),0,1,'L',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','',6);
$pdf->Cell(5,8,utf8_decode('NºO'),1,0,'C',0);
$pdf->Cell(5,8,utf8_decode('NºP'),1,0,'C',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(20,8,utf8_decode('DNI'),1,0,'C',0);
$pdf->Cell(50,8,utf8_decode('APELLIDO Y NOMBRE'),1,0,'C',0);
$pdf->SetFont('Arial','',6);
$pdf->MultiCell(27,4,utf8_decode('CALIFICACIONES'),1,'C',0);
$pdf->SetY(47); 
$pdf->SetX(117);
$pdf->Cell(20,4,utf8_decode('Nº de las Unidades'),1,1,'C',0);
$pdf->SetY(51); 
$pdf->SetX(90);
$pdf->SetFont('Arial','',8);
$pdf->Cell(9,4,utf8_decode('Esc'),1,0,'C',0);
$pdf->Cell(9,4,utf8_decode('Oral'),1,0,'C',0);
$pdf->Cell(9,4,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,4,utf8_decode('Esc'),1,0,'C',0);
$pdf->Cell(10,4,utf8_decode('Prom'),1,1,'C',0);

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='1' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='B' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 2

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='1' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='A' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 1

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='1' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='C' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 3

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='1' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='A' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 4

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='2' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='A' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 5

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='2' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='B' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 6

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='2' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='A' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 7

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='2' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='B' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 8

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='3' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='A' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 9

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='3' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='B' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 10

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='3' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='A' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 11

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='3' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='B' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 12

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='4' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Humanidades' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 13

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='4' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Economia' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 14

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='4' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Economia' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 15

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='5' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Humanidades' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 16

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='5' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Economia' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 17

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='5' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Economia' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 18

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}

if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='6' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Humanidades' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Mañana' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 19

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}
if((!empty($_SESSION['Alumno_Curso']) && $_SESSION['Alumno_Curso']=='6' )
&& (!empty($_SESSION['Alumno_Division']) && $_SESSION['Alumno_Division']=='Economia' )
&& (!empty($_SESSION['Alumno_Turno']) && $_SESSION['Alumno_Turno']=='Tarde' )){
$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos and primera.Curso= 20

ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Materia']) && $_SESSION['Alumno_Materia']==$row['Materias']) ){
if($row['Eval1Nota']<7 && $row['Eval1Recup1']<7 && $row['Eval1Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval2Nota']<7 && $row['Eval2Recup1']<7 && $row['Eval2Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval3Nota']<7 && $row['Eval3Recup1']<7 && $row['Eval3Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Eval4Nota']<7 && $row['Eval4Recup1']<7 && $row['Eval4Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{ 
if($row['Jis1Nota']<7 && $row['Jis1Recup']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval5Nota']<7 && $row['Eval5Recup1']<7 && $row['Eval5Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval6Nota']<7 && $row['Eval6Recup1']<7 && $row['Eval6Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval7Nota']<7 && $row['Eval7Recup1']<7 && $row['Eval7Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Eval8Nota']<7 && $row['Eval8Recup1']<7 && $row['Eval8Recup2']<7){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}else{
if($row['Jis2Nota']<7 && $row['Jis2Recup']<7 ){
$pdf->Cell(5,5,utf8_decode($i++),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode($row['Apellido'].", ".$row['Nombre']),1,0,'L',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
}}}}}}}}}}}}}


$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(50,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode(''),1,1,'C',0);

$pdf->Output('ActaVolante.pdf', 'I');
?>