<?php
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_evaluacion.php'; 
$ListadoNotas=Listar_Notas($MiConexion);
$CantidadNotas=count($ListadoNotas);
require_once 'funciones/insertar_notas.php'; 

if (isset($_POST['CursoId'])) {
$cursoId = $_POST['CursoId'];

if($cursoId=='1'){
$alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='1' and IdDivision='A'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias[]" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval1Nota[]" onchange="colorChange(this)" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval1Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval1Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval2Nota[]" onchange="colorChange(this)" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval2Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval2Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval3Nota[]" onchange="colorChange(this)" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval3Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval3Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval4Nota[]" onchange="colorChange(this)" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval4Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval4Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval5Nota[]" onchange="colorChange(this)" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval5Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval5Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval6Nota[]" onchange="colorChange(this)" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval6Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval6Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval7Nota[]" onchange="colorChange(this)" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval7Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval7Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Eval8Nota[]" onchange="colorChange(this)" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Eval8Recup1[]" onchange="colorChange(this)" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Eval8Recup2[]" onchange="colorChange(this)" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Jis1Nota[]" onchange="colorChange(this)" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="Jis1Recup[]" onchange="colorChange(this)" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="Jis2Nota[]" onchange="colorChange(this)" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="Jis2Recup[]" onchange="colorChange(this)" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="ColoqDiciembre[]" onchange="colorChange(this)" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="ColoqFebrero[]" onchange="colorChange(this)" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}


if($cursoId=='2'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='1' and IdDivision='B'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
   $output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='3'){
    $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='1' and IdDivision='C'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
  $output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='4'){
    $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='1' and IdDivision='A'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='5'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='2' and IdDivision='A'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='6'){
    $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='2' and IdDivision='B'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='7'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='2' and IdDivision='A'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='8'){
    $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='2' and IdDivision='B'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='9'){
 $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='3' and IdDivision='A'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='10'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='3' and IdDivision='B'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='11'){
  $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='3' and IdDivision='A'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='12'){
  $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='3' and IdDivision='B'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='13'){
    $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='4' and IdDivision='Humanidades'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='14'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='4' and IdDivision='Economia'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='15'){
 $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='4' and IdDivision='Economia'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='16'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='5' and IdDivision='Humanidades'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='17'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='5' and IdDivision='Economia'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='18'){
   $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='5' and IdDivision='Economia'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='19'){
  $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='6' and IdDivision='Humanidades'  and IdTurno = 'Mañana' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
$output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='20'){
  $alumnos = "SELECT alum.Id, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno, nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2, nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2, nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2, nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2, nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2, nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2, nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero 
FROM alumnos alum, notas nts 
where IdCurso='6' and IdDivision='Economia'  and IdTurno = 'Tarde' and alum.Id = nts.IdAlumnos
ORDER BY Apellido";


$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
 $output .= '<tr>';
$output .= '<td class="fixed-column">';
$output .= '<input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'];
$output .= '<br>';
$output .= '<input type="text" style="border:0; width: 170px;" name="materias" value="' . $fila['Materias'] .  '">';
$output .= '</td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="'. $fila['Eval1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="'. $fila['Eval1Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="'. $fila['Eval1Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="'. $fila['Eval2Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="'. $fila['Eval2Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="'. $fila['Eval2Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="'. $fila['Eval3Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="'. $fila['Eval3Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="'. $fila['Eval3Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="'. $fila['Eval4Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="'. $fila['Eval4Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="'. $fila['Eval4Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="'. $fila['Eval5Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="'. $fila['Eval5Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="'. $fila['Eval5Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="'. $fila['Eval6Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="'. $fila['Eval6Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="'. $fila['Eval6Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="'. $fila['Eval7Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="'. $fila['Eval7Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="'. $fila['Eval7Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="'. $fila['Eval8Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="'. $fila['Eval8Recup1'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="'. $fila['Eval8Recup2'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="'. $fila['Jis1Nota'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="'. $fila['Jis1Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="'. $fila['Jis2Nota'] .'"></td>';
$output .= '<td><input type="text" style="border:0; width: 20px;" name="jis2Recup" value="'. $fila['Jis2Recup'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="'. $fila['ColoqDiciembre'] .'"></td>';
$output .= '<td> <input type="text" style="border:0; width: 20px;" name="coloqFebrero" value="'. $fila['ColoqFebrero'] .'"></td>';
$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
}

?>
