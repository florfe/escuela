<?php 
function InsertarNotas($vConexion){
$SQL_Insert = "INSERT INTO notassegunda (IdAlumnos, Curso, Materias, Eval5Nota, Eval5Recup1, Eval5Recup2, 
    Eval6Nota, Eval6Recup1, Eval6Recup2, 
    Eval7Nota, Eval7Recup1, Eval7Recup2, 
    Eval8Nota, Eval8Recup1, Eval8Recup2, 
    Jis2Nota, Jis2Recup) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($vConexion, $SQL_Insert);
if ($stmt) {
mysqli_stmt_bind_param($stmt, 'sssssssssssssssss', 
    $idAlumno, $curso, $materia, 
    $eval5Nota, $eval5Recup1, $eval5Recup2, 
    $eval6Nota, $eval6Recup1, $eval6Recup2, 
    $eval7Nota, $eval7Recup1, $eval7Recup2, 
    $eval8Nota, $eval8Recup1, $eval8Recup2, 
    $jis2Nota, $jis2Recup );

for ($i = 0; $i < count($_POST['IdAlumnos']); $i++) {
$idAlumno = isset($_POST['IdAlumnos'][$i]) ? $_POST['IdAlumnos'][$i] : '';
$curso = isset($_POST['Curso']) ? $_POST['Curso'] : '';
$materia = isset($_POST['Materias']) ? $_POST['Materias'] : '';

$eval5Nota = isset($_POST['Eval5Nota'][$i]) ? $_POST['Eval5Nota'][$i] : '';
$eval5Recup1 = isset($_POST['Eval5Recup1'][$i]) ? $_POST['Eval5Recup1'][$i] : '';
$eval5Recup2 = isset($_POST['Eval5Recup2'][$i]) ? $_POST['Eval5Recup2'][$i] : '';

$eval6Nota = isset($_POST['Eval6Nota'][$i]) ? $_POST['Eval6Nota'][$i] : '';
$eval6Recup1 = isset($_POST['Eval6Recup1'][$i]) ? $_POST['Eval6Recup1'][$i] : '';
$eval6Recup2 = isset($_POST['Eval6Recup2'][$i]) ? $_POST['Eval6Recup2'][$i] : '';

$eval7Nota = isset($_POST['Eval7Nota'][$i]) ? $_POST['Eval7Nota'][$i] : '';
$eval7Recup1 = isset($_POST['Eval7Recup1'][$i]) ? $_POST['Eval7Recup1'][$i] : '';
$eval7Recup2 = isset($_POST['Eval7Recup2'][$i]) ? $_POST['Eval7Recup2'][$i] : '';

$eval8Nota = isset($_POST['Eval8Nota'][$i]) ? $_POST['Eval8Nota'][$i] : '';
$eval8Recup1 = isset($_POST['Eval8Recup1'][$i]) ? $_POST['Eval8Recup1'][$i] : '';
$eval8Recup2 = isset($_POST['Eval8Recup2'][$i]) ? $_POST['Eval8Recup2'][$i] : '';

$jis2Nota = isset($_POST['Jis2Nota'][$i]) ? $_POST['Jis2Nota'][$i] : '';
$jis2Recup = isset($_POST['Jis2Recup'][$i]) ? $_POST['Jis2Recup'][$i] : '';
$result = mysqli_stmt_execute($stmt);

if (!$result) {
    die('Error al intentar insertar el registro.' . mysqli_error($vConexion));
    }
        }

        mysqli_stmt_close($stmt);
        return true;
    } else {
        die('Error in prepared statement: ' . mysqli_error($vConexion));
        return false;
    }
}

?>






















  