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
$alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='1' and IdDivision='A'  and IdTurno = 'Mañana' ORDER BY Apellido";
 $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';


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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
if($cursoId=='8'){
    $alumnos = "SELECT Id, Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos where IdCurso='2' and IdDivision='B'  and IdTurno = 'Tarde' ORDER BY Apellido";
    $grupo = 1; 
$output = '';
$lista = mysqli_query($MiConexion, $alumnos);
if (!$lista) { die("Error in SQL query: " . mysqli_error($MiConexion)); }
if (mysqli_num_rows($lista) > 0) {
    while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



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
       $output .= '<td class="fixed-column"><input type="hidden" name="IdAlumnos[]" value="' . $fila['Id'] . '">' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
$output .= '<td ><select name="Eval1Nota[]"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval1Recup1[]"  id="eval1Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval1Recup2[]"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Nota[]"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup1[]"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval2Recup2[]" id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Nota[]"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup1[]"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval3Recup2[]" id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Nota[]"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup1[]"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval4Recup2[]" id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Nota[]"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval5Recup1[]"  id="eval5Recup1" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td ><select name="Eval5Recup2[]"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Nota[]"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup1[]"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval6Recup2[]" id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Nota[]"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup1[]"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval7Recup2[]" id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Nota[]"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup1[]"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Eval8Recup2[]" id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Nota[]"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis1Recup[]"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Nota[]"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="Jis2Recup[]"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>';
$output .= '<td ><select name="ColoquioFebrero[]"  id="coloquioFebrero" onchange="colorChange(this)" ><option value=""></option>';
for ($i = 0; $i < $CantidadNotas; $i++) {$selected = (!empty($_POST["ColoquioFebrero"]) && $_POST["ColoquioFebrero"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
$output .= '<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>';}
$output .= '</select></td>'; 
$output .= '<td>';
$output .= '<a href="insertarnotasnuevas.php?id='. $fila['Id'] .'">Cargar notas...</a>';
$output .= '</td>';



$output .= '</tr>';
$grupo++;
  }
}
else {$output .= '<tr><td colspan="2">No hay estudiantes del curso seleccionado.</td></tr>';}
  echo $output;
}
}

?>
