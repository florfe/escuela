<?php
function ActualizarNotas($vConexion) {
  $SQL_Update = "UPDATE notas SET 
        Eval1Nota = ?, Eval1Recup1 = ?, Eval1Recup2 = ?,
        Eval2Nota = ?, Eval2Recup1 = ?, Eval2Recup2 = ?,
        Eval3Nota = ?, Eval3Recup1 = ?, Eval3Recup2 = ?,
        Eval4Nota = ?, Eval4Recup1 = ?, Eval4Recup2 = ?,
        Jis1Nota = ?, Jis1Recup = ?,
        Eval5Nota = ?, Eval5Recup1 = ?, Eval5Recup2 = ?,
        Eval6Nota = ?, Eval6Recup1 = ?, Eval6Recup2 = ?,
        Eval7Nota = ?, Eval7Recup1 = ?, Eval7Recup2 = ?,
        Eval8Nota = ?, Eval8Recup1 = ?, Eval8Recup2 = ?,
        Jis2Nota = ?, Jis2Recup = ?,
        ColoqDiciembre = ?, ColoqFebrero = ?
        WHERE IdAlumnos = ? ";
$stmt = mysqli_prepare($vConexion, $SQL_Update);
if ($stmt) {mysqli_stmt_bind_param($stmt, '
   ssssssssssss
   ssssssssssss
   sssssss
  ', 
$eval1Nota, $eval1Recup1, $eval1Recup2,
$eval2Nota, $eval2Recup1, $eval2Recup2,
$eval3Nota, $eval3Recup1, $eval3Recup2,
$eval4Nota, $eval4Recup1, $eval4Recup2,
$jis1Nota, $jis1Recup,
$eval5Nota, $eval5Recup1, $eval5Recup2,
$eval6Nota, $eval6Recup1, $eval6Recup2,
$eval7Nota, $eval7Recup1, $eval7Recup2,
$eval8Nota, $eval8Recup1, $eval8Recup2,
$jis2Nota, $jis2Recup,
$coloqDiciembre, $coloqFebrero,
$idAlumno);
for ($i = 0; $i < count($_POST['IdAlumnos']); $i++) {
$idAlumno = isset($_POST['IdAlumnos'][$i]) ? $_POST['IdAlumnos'][$i] : '';

$eval1Nota = isset($_POST['Eval1Nota'][$i]) ? $_POST['Eval1Nota'][$i] : '';
$eval1Recup1 = isset($_POST['Eval1Recup1'][$i]) ? $_POST['Eval1Recup1'][$i] : '';
$eval1Recup2 = isset($_POST['Eval1Recup2'][$i]) ? $_POST['Eval1Recup2'][$i] : '';
$eval2Nota = isset($_POST['Eval2Nota'][$i]) ? $_POST['Eval2Nota'][$i] : '';
$eval2Recup1 = isset($_POST['Eval2Recup1'][$i]) ? $_POST['Eval2Recup1'][$i] : '';
$eval2Recup2 = isset($_POST['Eval2Recup2'][$i]) ? $_POST['Eval2Recup2'][$i] : '';
$eval3Nota = isset($_POST['Eval3Nota'][$i]) ? $_POST['Eval3Nota'][$i] : '';
$eval3Recup1 = isset($_POST['Eval3Recup1'][$i]) ? $_POST['Eval3Recup1'][$i] : '';
$eval3Recup2 = isset($_POST['Eval3Recup2'][$i]) ? $_POST['Eval3Recup2'][$i] : '';
$eval4Nota = isset($_POST['Eval4Nota'][$i]) ? $_POST['Eval4Nota'][$i] : '';
$eval4Recup1 = isset($_POST['Eval4Recup1'][$i]) ? $_POST['Eval4Recup1'][$i] : '';
$eval4Recup2 = isset($_POST['Eval4Recup2'][$i]) ? $_POST['Eval4Recup2'][$i] : '';
$jis1Nota = isset($_POST['Jis1Nota'][$i]) ? $_POST['Jis1Nota'][$i] : '';
$jis1Recup = isset($_POST['Jis1Recup'][$i]) ? $_POST['Jis1Recup'][$i] : '';
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
$coloqDiciembre = isset($_POST['ColoquioDiciembre'][$i]) ? $_POST['ColoquioDiciembre'][$i] : '';
$coloqFebrero = isset($_POST['ColoquioFebrero'][$i]) ? $_POST['ColoquioFebrero'][$i] : ''; 


$result = mysqli_stmt_execute($stmt);
if (!$result) {
die('Error al intentar actualizar el registro.' .  mysqli_stmt_error($stmt));
            }
        }
mysqli_stmt_close($stmt);
return true;
    } 
else {
die('Error in prepared statement: ' . mysqli_error($vConexion));
return false;
    }
}    
?>