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
if ($this->PageNo() != 2){
$this->SetFont('Arial','B',11);
$this->Cell(5,1,utf8_decode('I.P.E.M. Nº 123 - BLANCA ETCHEMENDY'),0,1,'L');
$this->SetFont('Arial','B', 9);
$this->Cell(5,6,utf8_decode('CARMELO IBARRA ESQ. NEIVA S/N - CAPITAL - Tel 0351-4333532'),0,0,'L');
$this->SetFont('Arial','B',11);
$this->Cell(270,6,utf8_decode('LISTADO DE CALIFICACIONES'),0,0,'R');
$this->Line(5, 16, 293, 16);
$this->Ln(5);}
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("Landscape");
$pdf->SetFont('Arial','',9);

$pdf->Cell(5,5,utf8_decode('Plan: Ciclo Basico'),0,0,'L',0);
$pdf->Cell(270,5,utf8_decode('Curso: ').$_SESSION['Docente_IdCurso'].' '.utf8_decode('División: ').$_SESSION['Docente_IdDivision'].' '.utf8_decode('Turno: '.$_SESSION['Docente_IdTurno']).' '.utf8_decode('Ciclo Lectivo: 2023'),0,1,'R',0);

$pdf->Cell(5,5,utf8_decode('Docente: ').$_SESSION['Docente_Apellido'].', '.$_SESSION['Docente_Nombre'],0,0,'L',0);
$pdf->Cell(170,5,utf8_decode('Tipo y Nº de DNI: ').$_SESSION['Docente_NumeroDni'],0,0,'C',0);
$pdf->Cell(155,5,utf8_decode('Espacio Curricular: ').$_SESSION['Docente_Materias'],0,1,'L',0);
$pdf->Line(5, 26, 293, 26);
$pdf->Ln(1);

//materias
$pdf->Cell(70,10,utf8_decode('Estudiantes'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 1'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 2'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 3'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 4'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 5'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 6'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 7'),1,0,'C',0);
$pdf->Cell(15,5,utf8_decode('Eval 8'),1,0,'C',0);
$pdf->Cell(16,5,utf8_decode('JIS 1'),1,0,'C',0);
$pdf->Cell(16,5,utf8_decode('JIS 2'),1,0,'C',0);
$pdf->MultiCell(19,10,utf8_decode('Col. Dic.'),1,'C',0);
$pdf->SetY(27); /* Set 20 Eje Y */
$pdf->SetX(251);
$pdf->MultiCell(19,10,utf8_decode('Col.Feb.'),1,'C',0);
$pdf->SetY(27); /* Set 20 Eje Y */
$pdf->SetX(270);
$pdf->Multicell(19,10,utf8_decode('Prom. Final'),1,'C',0);
$pdf->SetY(32); /* Set 20 Eje Y */
$pdf->SetX(80);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R1'),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode('R2'),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode('R'),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode('N'),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode('R'),1,1,'C',0);
$pdf->Ln(1);

$consulta = "SELECT 
    alum.Id, alum.Apellido, alum.Nombre, alum.NumeroDni, 
    cc.Id, cc.Curso as Curso, cc.Division as Division, cc.Turno as Turno,
    primera.IdAlumnos, primera.Materias, primera.Curso, 
    primera.Eval1Nota, primera.Eval1Recup1, primera.Eval1Recup2,
    primera.Eval2Nota, primera.Eval2Recup1, primera.Eval2Recup2,
    primera.Eval3Nota, primera.Eval3Recup1, primera.Eval3Recup2,
    primera.Eval4Nota, primera.Eval4Recup1, primera.Eval4Recup2,
    primera.Eval5Nota, primera.Eval5Recup1, primera.Eval5Recup2,
    primera.Eval6Nota, primera.Eval6Recup1, primera.Eval6Recup2,
    primera.Eval7Nota, primera.Eval7Recup1, primera.Eval7Recup2,
    primera.Eval8Nota, primera.Eval8Recup1, primera.Eval8Recup2,
    primera.Jis1Nota, primera.Jis1Recup, 
    primera.Jis2Nota, primera.Jis2Recup,
    primera.ColoqDiciembre, primera.ColoqFebrero
FROM notas AS primera
JOIN alumnos AS alum ON alum.Id = primera.IdAlumnos
JOIN cursoscompletos AS cc ON cc.Id = primera.Curso
ORDER BY alum.Apellido";
$resultado=mysqli_query($MiConexion, $consulta); 
if (!$resultado) {
die("Error in SQL query: " . mysqli_error($MiConexion));}
$i=1;

while($row=mysqli_fetch_assoc($resultado)){
if ( $_SESSION['Docente_Materias']==$row['Materias']
&&  $row['Curso']=='2'
){

$pdf->Cell(70,5,utf8_decode( $row['Apellido'].", ".$row['Nombre'] ),1,0,'L',0);
$pdf->Cell(5,5,utf8_decode($row['Eval1Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval1Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval1Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval2Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval2Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval2Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval3Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval3Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval3Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval4Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval4Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval4Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval5Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval5Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval5Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval6Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval6Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval6Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval7Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval7Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval7Recup2']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval8Nota']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval8Recup1']),1,0,'C',0);
$pdf->Cell(5,5,utf8_decode($row['Eval8Recup2']),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode($row['Jis1Nota']),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode($row['Jis1Recup']),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode($row['Jis2Nota']),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode($row['Jis2Recup']),1,0,'C',0);
$pdf->Cell(19,5,utf8_decode($row['ColoqDiciembre']),1,0,'C',0);
$pdf->Cell(19,5,utf8_decode($row['ColoqFebrero']),1,0,'C',0);
if (!empty($row['ColoqFebrero']) && $row['ColoqFebrero'] > 6  ) {
$pdf->Cell(19, 5, utf8_decode($row['ColoqFebrero']), 1, 0, 'C', 0);
                                                                } 
elseif (!empty($row['ColoqFebrero']) && $row['ColoqFebrero'] < 7 && $row['ColoqFebrero'] >= 1) {
$pdf->SetTextColor(255, 0, 0); // Rojo
$pdf->Cell(19, 5, utf8_decode("Adeuda"), 1, 0, 'C', 0);
$pdf->SetTextColor(0, 0, 0); // Restaurar color a negro (opcional)
                                                                                                } 
elseif (!empty($row['ColoqDiciembre']) && $row['ColoqDiciembre'] > 6  ) {
$pdf->Cell(19, 5, utf8_decode($row['ColoqDiciembre']), 1, 0, 'C', 0);
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
   $pdf->Cell(19, 5, utf8_decode('Aprobada'), 1, 0, 'C', 0);
                                            }
$pdf->Cell(19, 5, utf8_decode(''), 0, 1, 'C', 0);
                          }}


$pdf->Output();
?>