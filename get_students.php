<?php
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
if (isset($_POST['CursoId'])) {
  $cursoId = $_POST['CursoId'];

if($cursoId=='1'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='1' and IdDivision='A'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}


if($cursoId=='2'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='1' and IdDivision='B'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='3'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='1' and IdDivision='C'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='4'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='1' and IdDivision='A'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='5'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='2' and IdDivision='A'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='6'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='2' and IdDivision='B'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
   $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='7'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='2' and IdDivision='A'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
   $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='8'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='2' and IdDivision='b'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
   $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='9'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='3' and IdDivision='A'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
   $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='10'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='3' and IdDivision='B'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='11'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='3' and IdDivision='A'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='12'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='3' and IdDivision='B'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='13'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='4' and IdDivision='Humanidades'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='14'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='4' and IdDivision='Economia'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='15'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='4' and IdDivision='Economia'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='16'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='5' and IdDivision='Humanidades'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='17'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='5' and IdDivision='Economia'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='18'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='5' and IdDivision='Economia'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='19'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='6' and IdDivision='Humanidades'  and IdTurno = 'Mañana' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

if($cursoId=='20'){
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='6' and IdDivision='Economia'  and IdTurno = 'Tarde' ORDER BY Apellido";
$grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
 	while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    $output .= '<td><input type="radio" value="Presente" id="Presente' . $grupo . '" name="Falta' . $grupo . '[]" checked></td>';
    $output .= '<td><input type="radio" value="Justificada" id="Justificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Injustificada" id="Injustificada' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Actividad" id="Actividad' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Embarazo" id="Embarazo' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
    $output .= '<td><input type="radio" value="Deportiva" id="Deportiva' . $grupo . '" name="Falta' . $grupo . '[]" ></td>';
	$output .= '</tr>';
    $grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}

}
?>
