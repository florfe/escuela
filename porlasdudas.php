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
    $this->Cell(8,10,'Libreton',0,0,'C');
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
$this->Cell(0,-20,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');

}
}


$pdf = new PDF('P','mm','A5');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$cursoCond = $_SESSION['Alumno_Curso'];
$divisionCond = $_SESSION['Alumno_Division'];
$turnoCond = $_SESSION['Alumno_Turno'];

$consulta="SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
cc.Id, cc.Curso, cc.Division,cc.Turno,
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis2Nota, primera.Jis2Recup,
    primera.ColoqDiciembre, primera.ColoqFebrero
FROM notas primera, alumnos alum, cursoscompletos cc
WHERE alum.Id = primera.IdAlumnos and primera.Curso=cc.Id
AND cc.Curso = '$cursoCond' AND cc.Division = '$divisionCond' AND cc.Turno = '$turnoCond'"; 
$resultado=mysqli_query($MiConexion, $consulta); 
  if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));
} 
$i=1;

while($row=mysqli_fetch_assoc($resultado)){
if($row['Curso']=='1' && $row['Division']=='B'  && $row['Turno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode($row['Materias']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}

if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['Curso']=='1' && $row['Division']=='B'  && $row['Turno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode($row['Materias']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}





if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='C'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='C'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=3";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='1' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='1' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=4";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=5";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=6";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=7";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='2' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='2' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=8";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=9";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=10";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='A'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='A'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=11";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='3' && $_SESSION['Alumno_Division']=='B'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='3' && $row['IdDivision']=='B'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=12";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='4' && $_SESSION['Alumno_Division']=='Humanidades'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='4' && $row['IdDivision']=='Humanidades'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=13";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='4' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='4' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=14";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='4' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='4' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=15";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='5' && $_SESSION['Alumno_Division']=='Humanidades'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='5' && $row['IdDivision']=='Humanidades'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=16";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='5' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='5' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=17";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='5' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='5' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=18";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}


if($_SESSION['Alumno_Curso']=='6' && $_SESSION['Alumno_Division']=='Humanidades'&& $_SESSION['Alumno_Turno']=='Mañana'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='6' && $row['IdDivision']=='Humanidades'  && $row['IdTurno']==utf8_decode('Mañana')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=19";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

if($_SESSION['Alumno_Curso']=='6' && $_SESSION['Alumno_Division']=='Economia'&& $_SESSION['Alumno_Turno']=='Tarde'){
while($row=mysqli_fetch_assoc($resultado)){
if($row['IdCurso']=='6' && $row['IdDivision']=='Economia'  && $row['IdTurno']==utf8_decode('Tarde')) {
$pdf->Cell(30,7,utf8_decode('Estudiante: '),1,0,'C',0);
$pdf->Cell(95,7,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(10,7,utf8_decode('DNI: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($row['NumeroDni']),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Curso: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Curso']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Division: '),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode($_SESSION['Alumno_Division']),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Turno: '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode($_SESSION['Alumno_Turno']),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Prom'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Dic.'),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode('Feb.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Estado Ac.'),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode('Observacion'),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$consulta2="SELECT distinct Materia FROM  hora Where IdCurso=20";
$resultado2=mysqli_query($MiConexion, $consulta2); 
while($row=mysqli_fetch_assoc($resultado2)){
$pdf->Cell(55,7,utf8_decode($row['Materia']),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$i=0;
for($i=0; $i<4; $i++){ 
$pdf->Cell(55,7,utf8_decode(''),1,0,'L',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(10,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),1,0,'C',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);}
$pdf->Cell(20,7,utf8_decode('Previa 1: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('Previa 2: '),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(20,7,utf8_decode('3ª Materia:'),1,0,'L',0);
$pdf->Cell(45,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(60,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Viene de: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Cell(55,7,utf8_decode('Pasa a: '),1,0,'L',0);
$pdf->Cell(70,7,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(25,7,utf8_decode(' '),0,1,'C',0);
$pdf->Ln(20);}}}

$pdf->Output('LibretaAlumno.pdf', 'I');
?>