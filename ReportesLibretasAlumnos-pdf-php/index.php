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
 require_once 'funciones/id_notas.php'; 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{        	
   if ($this->PageNo() != 2){
     
    // Arial bold 15
    $this->SetFont('Arial','B',11);
    
    // Título
    $this->Cell(5,1,utf8_decode('I.P.E.M. Nº 123 - BLANCA ETCHEMENDY'),0,1,'L');
    $this->SetFont('Arial','B', 9);
     $this->Cell(5,6,utf8_decode('CARMELO IBARRA ESQ. NEIVA S/N - CAPITAL - Tel 0351-4333532'),0,0,'L');
     $this->SetFont('Arial','B',11);
     $this->Cell(270,6,utf8_decode('INFORME DE PROGRESO ESCOLAR'),0,0,'R');
     
     $this->Line(5, 16, 293, 16);
    // Salto de línea
    $this->Ln(5);}
}

// Pie de página
function Footer()
{
    if ($this->PageNo() != 2){
 //Posición: a 1,5 cm del final
  $this->SetY(-0.001);
  $this->Line(8, 187, 58, 187);
  $this->Line(115, 187, 158, 187);
 //Arial italic 8
$this->SetFont('Arial','I',8);
$this->Cell(0,-40,utf8_decode('Firma del Padre, Madre o Tutor '),0,0,'L');
$this->Cell(-300,-40,utf8_decode('Firma del/la Director/a '),0,0,'C');
 //Número de página
$this->Cell(0,-40,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'R');
// Logo
   $this->Image('img/firma.png' , 110 , 155 , 45);}
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("Landscape");


$pdf->SetFont('Arial','',9);
$pdf->Cell(5,7,utf8_decode('Plan: Ciclo ').$_SESSION['Alumno_IdCiclo'],0,0,'L',0);
$pdf->Cell(270,7,utf8_decode('Curso: ').$_SESSION['Alumno_IdCurso'].' '.utf8_decode('División: ').$_SESSION['Alumno_IdDivision'].' '.utf8_decode('Turno: '.$_SESSION['Alumno_IdTurno']).' '.utf8_decode('Ciclo Lectivo: 2023'),0,1,'R',0);

$pdf->Cell(5,7,utf8_decode('Estudiante: ').$_SESSION['Alumno_Apellido'].', '.$_SESSION['Alumno_Nombre'],0,0,'L',0);
$pdf->Cell(270,7,utf8_decode('Tipo y Nº de DNI: ').$_SESSION['Alumno_NumeroDni'],0,1,'C',0);
$pdf->Line(5, 29, 293, 29);
$pdf->Ln(1);
//materias
$pdf->Cell(70,14,utf8_decode('Espacios curriculares (E.C.)'),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Eval 1'),1,0,'C',0);

$pdf->Cell(15,7,utf8_decode('Eval 2'),1,0,'C',0);

$pdf->Cell(15,7,utf8_decode('Eval 3'),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Eval 4'),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Eval 5'),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Eval 6'),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Eval 7'),1,0,'C',0);
$pdf->Cell(15,7,utf8_decode('Eval 8'),1,0,'C',0);
$pdf->Cell(16,7,utf8_decode('JIS 1'),1,0,'C',0);
$pdf->Cell(16,7,utf8_decode('JIS 2'),1,0,'C',0);
$pdf->MultiCell(19,14,utf8_decode('Col. Dic.'),1,'C',0);
$pdf->SetY(31); /* Set 20 Eje Y */
$pdf->SetX(251);
$pdf->MultiCell(19,14,utf8_decode('Col.Feb.'),1,'C',0);
$pdf->SetY(31); /* Set 20 Eje Y */
$pdf->SetX(270);
$pdf->Multicell(19,14,utf8_decode('Prom. Final'),1,'C',0);
$pdf->SetY(38); /* Set 20 Eje Y */
$pdf->SetX(80);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode('R'),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode('R'),1,1,'C',0);


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
    primera.Jis2Nota, primera.Jis2Recup,
    primera.ColoqDiciembre, primera.ColoqFebrero
FROM notas as primera
INNER JOIN alumnos as alum 
ON alum.Id = primera.IdAlumnos
ORDER BY primera.Materias";

$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if(
   (!empty($_SESSION['Alumno_Apellido'])&& $_SESSION['Alumno_Apellido']== $row['Apellido'])
   && (!empty($_SESSION['Alumno_Nombre'])&&$_SESSION['Alumno_Nombre']==$row['Nombre'])){

$pdf->Cell(70,7,utf8_decode($row['Materias']),1,0,'L',0);
$pdf->Cell(5,7,utf8_decode($row['Eval1Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval1Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval1Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval2Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval2Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval2Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval3Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval3Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval3Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval4Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval4Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval4Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval5Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval5Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval5Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval6Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval6Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval6Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval7Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval7Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval7Recup2']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval8Nota']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval8Recup1']),1,0,'C',0);
$pdf->Cell(5,7,utf8_decode($row['Eval8Recup2']),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode($row['Jis1Nota']),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode($row['Jis1Recup']),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode($row['Jis2Nota']),1,0,'C',0);
$pdf->Cell(8,7,utf8_decode($row['Jis2Recup']),1,0,'C',0);
$pdf->Cell(19,7,utf8_decode($row['ColoqDiciembre']),1,0,'C',0);
$pdf->Cell(19,7,utf8_decode($row['ColoqFebrero']),1,0,'C',0);

if (!empty($row['ColoqFebrero']) && $row['ColoqFebrero'] > 6  ) {
$pdf->Cell(19, 7, utf8_decode($row['ColoqFebrero']), 1, 0, 'C', 0);
      } 
elseif (!empty($row['ColoqFebrero']) && $row['ColoqFebrero'] < 7 && $row['ColoqFebrero'] >= 1) {
$pdf->SetTextColor(255, 0, 0); // Rojo
$pdf->Cell(19, 7, utf8_decode("Adeuda"), 1, 0, 'C', 0);
$pdf->SetTextColor(0, 0, 0); // Restaurar color a negro (opcional)
      } 
elseif (!empty($row['ColoqDiciembre']) && $row['ColoqDiciembre'] > 6  ) {
$pdf->Cell(19, 7, utf8_decode($row['ColoqDiciembre']), 1, 0, 'C', 0);
      } 
elseif ((!empty($row['Jis2Recup']) && $row['Jis2Recup'] > 6)  ||  (!empty($row['Jis2Nota']) && $row['Jis2Nota'] > 6)  
   &&  (!empty($row['Jis1Recup']) && $row['Jis1Recup'] > 6)  ||  (!empty($row['Jis1Nota']) && $row['Jis1Nota'] > 6)
   &&  (!empty($row['Eval8Recup2']) && $row['Eval8Recup2'] > 6)  ||  (!empty($row['Eval8Recup1']) && $row['Eval8Recup1'] > 6)  ||  (!empty($row['Eval8Nota']) && $row['Eval8Nota'] > 6)
   &&  (!empty($row['Eval7Recup2']) && $row['Eval7Recup2'] > 6)  ||  (!empty($row['Eval7Recup1']) && $row['Eval7Recup1'] > 6)  ||  (!empty($row['Eval7Nota']) && $row['Eval7Nota'] > 6)
   &&  (!empty($row['Eval6Recup2']) && $row['Eval6Recup2'] > 6)  ||  (!empty($row['Eval6Recup1']) && $row['Eval6Recup1'] > 6)  ||  (!empty($row['Eval6Nota']) && $row['Eval6Nota'] > 6)
   &&  (!empty($row['Eval5Recup2']) && $row['Eval5Recup2'] > 6)  ||  (!empty($row['Eval5Recup1']) && $row['Eval5Recup1'] > 6)  ||  (!empty($row['Eval5Nota']) && $row['Eval5Nota'] > 6)
   &&  (!empty($row['Eval4Recup2']) && $row['Eval4Recup2'] > 6)  ||  (!empty($row['Eval4Recup1']) && $row['Eval4Recup1'] > 6)  ||  (!empty($row['Eval4Nota']) && $row['Eval4Nota'] > 6)
   &&  (!empty($row['Eval3Recup2']) && $row['Eval3Recup2'] > 6)  ||  (!empty($row['Eval3Recup1']) && $row['Eval3Recup1'] > 6)  ||  (!empty($row['Eval3Nota']) && $row['Eval3Nota'] > 6)
   &&  (!empty($row['Eval2Recup2']) && $row['Eval2Recup2'] > 6)  ||  (!empty($row['Eval2Recup1']) && $row['Eval2Recup1'] > 6)  ||  (!empty($row['Eval2Nota']) && $row['Eval2Nota'] > 6)
   &&  (!empty($row['Eval1Recup2']) && $row['Eval1Recup2'] > 6)  ||  (!empty($row['Eval1Recup1']) && $row['Eval1Recup1'] > 6)  ||  (!empty($row['Eval1Nota']) && $row['Eval1Nota'] > 6)){
  
   $pdf->Cell(19, 7, utf8_decode('Aprobada'), 1, 0, 'C', 0);
}
$pdf->Cell(19, 7, utf8_decode(''), 0, 1, 'C', 0);

}
}


$pdf->Ln(2);
$pdf->Cell(70,7,utf8_decode('Inasistencias Diarias'),1,0,'C',0);
$pdf->Cell(68,7,utf8_decode('Observaciones'),1,0,'C',0);
$pdf->Cell(74,7,utf8_decode('E.C. EN CONTRATURNO EN ESTADO T.E.A.'),1,0,'C',0);
$pdf->Cell(68,7,utf8_decode('E.C. PREVIOS'),1,1,'C',0);
$pdf->Cell(35,7,utf8_decode('Justificadas'),1,0,'C',0);
$pdf->Cell(35,7,utf8_decode('Injustificadas'),1,0,'C',0);
$pdf->MultiCell(68,21,utf8_decode(' '),1,'C',0);
$pdf->SetY(131); /* Set 20 Eje Y */
$pdf->SetX(10);

$consulta = "SELECT alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
   asist.IdAlumnos, asist.EstadoAsis 
FROM alumnos as alum, asistenciaalum asist 
WHERE alum.Id = asist.IdAlumnos
";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));
}
$faltasJustificadas = 0;
$faltasInjustificadas = 0;
$i=1;
while($row=mysqli_fetch_assoc($resultado)){
if((!empty($_SESSION['Alumno_Apellido'])&& $_SESSION['Alumno_Apellido']== $row['Apellido'])
   && (!empty($_SESSION['Alumno_Nombre'])&&$_SESSION['Alumno_Nombre']==$row['Nombre'])){
   if ($row['EstadoAsis'] == 'Justificada') {
$faltasJustificadas++;
} elseif ($row['EstadoAsis'] == 'Injustificada') {
$faltasInjustificadas++;
}


}}
$pdf->Cell(35,7,utf8_decode($faltasJustificadas),1,0,'C',0);
$pdf->Cell(35,7,utf8_decode($faltasInjustificadas),1,1,'C',0);
$pdf->Cell(35,7,utf8_decode('Estado'),1,0,'C',0);
$pdf->Cell(35,7,utf8_decode(' '),1,1,'C',0);
$pdf->SetY(124); /* Set 20 Eje Y */
$pdf->SetX(148);
$pdf->Cell(74,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(68,7,utf8_decode(' '),1,1,'C',0);
$pdf->SetY(131); /* Set 20 Eje Y */
$pdf->SetX(148);
$pdf->Cell(74,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(68,7,utf8_decode(' '),1,1,'C',0);
 $pdf->SetY(138); /* Set 20 Eje Y */
$pdf->SetX(148);



$pdf->Cell(74,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(68,7,utf8_decode(' '),1,1,'C',0);

$pdf->Line(80, 145, 148, 145);



$pdf->AddPage("Landscape");
$pdf->Line(5, 10, 293, 10);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140,10,utf8_decode('PERIODO DE EVALUACION: COLOQUIO DICIEMBRE'),1,1,'C',0);
$pdf->Image('img/escudo.jpeg' , 213 , 15 , 12);
$pdf->Ln(2);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,10,utf8_decode('DISCIPLINA'),1,0,'C',0);
$pdf->Cell(20,10,utf8_decode('FECHA'),1,0,'C',0);
$pdf->Cell(30,5,utf8_decode('CALIFICACION'),1,0,'C',0);
$pdf->MultiCell(40,10,utf8_decode('FIRMA PROFESOR'),1,'C',0);
$pdf->SetY(32); /* Set 20 Eje Y */
$pdf->SetX(80);
$pdf->Cell(15,5,utf8_decode('Nº'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('LETRA'),1,0,'C',0);

$pdf->SetFont('Arial','',11);
$pdf->Cell(220,5,utf8_decode('GOBIERNO DE CÓRDOBA'),0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('MINISTERIO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('SECRETARÍA DE ESTADO DE EDUCACIÓN'),0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('DIRECCIÓN GENERAL DE EDUCACIÓN SECUNDARIA'),0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(140,7,utf8_decode('I.P.E.M. Nº 123 - BLANCA ETCHEMENDY'),0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);

$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(140,7,utf8_decode('Localidad: Córdoba'),0,1,'C',0);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(140,7,utf8_decode('Departamento: Capital'),0,1,'C',0);
$pdf->Ln(3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140,10,utf8_decode('PERIODO DE EVALUACION: COLOQUIO FEBRERO'),1,0,'C',0);
$pdf->Cell(140,10,utf8_decode('LIBRETA DE CALIFICACIONES DEL ESTUDIANTE'),0,1,'C',0);
$pdf->Ln(2);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,10,utf8_decode('DISCIPLINA'),1,0,'C',0);
$pdf->Cell(20,10,utf8_decode('FECHA'),1,0,'C',0);
$pdf->Cell(30,5,utf8_decode('CALIFICACION'),1,0,'C',0);
$pdf->MultiCell(40,10,utf8_decode('FIRMA PROFESOR'),1,'C',0);
$pdf->SetY(120); /* Set 20 Eje Y */
$pdf->SetX(80);
$pdf->Cell(15,5,utf8_decode('Nº'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('LETRA'),1,1,'C',0);



$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('PRIMER CICLO'),0,1,'C',0);
$pdf->SetFont('Arial','',9);

$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);

$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);

$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,1,'C',0);


$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('Curso: ').$_SESSION['Alumno_IdCurso'].' '.utf8_decode('División: ').$_SESSION['Alumno_IdDivision'].' '.utf8_decode('Turno: '.$_SESSION['Alumno_IdTurno']),0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('Estudiante: ').$_SESSION['Alumno_Apellido'].', '.$_SESSION['Alumno_Nombre'],0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140,7,utf8_decode('Tipo y Nº de DNI: ').$_SESSION['Alumno_NumeroDni'],0,1,'C',0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(20,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(30,7,utf8_decode(' '),1,0,'C',0);
$pdf->Cell(40,7,utf8_decode(' '),1,0,'C',0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140,7,utf8_decode('AÑO LECTIVO 2023'),0,1,'C',0);
$pdf->Line(5, 193, 293, 193);
$pdf->Output('LibretaAlumno.pdf', 'I');
?>