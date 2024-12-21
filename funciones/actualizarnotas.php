<?php
function ActualizarNotas($vConexion) {
    $id=$_POST['id'];
    $eval1Nota=$_POST['eval1Nota'];
    $eval1Recup1=$_POST['eval1Recup1'];
    $eval1Recup2=$_POST['eval1Recup2'];
    $eval2Nota=$_POST['eval2Nota'];
    $eval2Recup1=$_POST['eval2Recup1'];
    $eval2Recup2=$_POST['eval2Recup2'];
    $eval3Nota=$_POST['eval3Nota'];
    $eval3Recup1=$_POST['eval3Recup1'];
    $eval3Recup2=$_POST['eval3Recup2'];
    $eval4Nota=$_POST['eval4Nota'];
    $eval4Recup1=$_POST['eval4Recup1'];
    $eval4Recup2=$_POST['eval4Recup2'];
    $eval5Nota=$_POST['eval5Nota'];
    $eval5Recup1=$_POST['eval5Recup1'];
    $eval5Recup2=$_POST['eval5Recup2'];
    $eval6Nota=$_POST['eval6Nota'];
    $eval6Recup1=$_POST['eval6Recup1'];
    $eval6Recup2=$_POST['eval6Recup2'];
    $eval7Nota=$_POST['eval7Nota'];
    $eval7Recup1=$_POST['eval7Recup1'];
    $eval7Recup2=$_POST['eval7Recup2'];
    $eval8Nota=$_POST['eval8Nota'];
    $eval8Recup1=$_POST['eval8Recup1'];
    $eval8Recup2=$_POST['eval8Recup2'];
    $jis1Nota=$_POST['jis1Nota'];
    $jis1Recup=$_POST['jis1Recup'];
    $jis2Nota=$_POST['jis2Nota'];
    $jis2Recup=$_POST['jis2Recup'];
    $coloqDiciembre=$_POST['coloqDiciembre'];
    $coloqFebrero=$_POST['coloqFebrero'];
    //1) genero la consulta que deseo
    $SQL = "UPDATE notas SET 
    Eval1Nota = '$eval1Nota', Eval1Recup1 = '$eval1Recup1', Eval1Recup2 = '$eval1Recup2',
Eval2Nota = '$eval2Nota', Eval2Recup1 = '$eval2Recup1', Eval2Recup2 = '$eval2Recup2',
Eval3Nota = '$eval3Nota', Eval3Recup1 = '$eval3Recup1', Eval3Recup2 = '$eval3Recup2',
Eval4Nota = '$eval4Nota', Eval4Recup1 = '$eval4Recup1', Eval4Recup2 = '$eval4Recup2',
Eval5Nota = '$eval5Nota', Eval5Recup1 = '$eval5Recup1', Eval5Recup2 = '$eval5Recup2',
Eval6Nota = '$eval6Nota', Eval6Recup1 = '$eval6Recup1', Eval6Recup2 = '$eval6Recup2',
Eval7Nota = '$eval7Nota', Eval7Recup1 = '$eval7Recup1', Eval7Recup2 = '$eval7Recup2',
Eval8Nota = '$eval8Nota', Eval8Recup1 = '$eval8Recup1', Eval8Recup2 = '$eval8Recup2',
Jis1Nota = '$jis1Nota', Jis1Recup = '$jis1Recup', ColoqDiciembre = '$coloqDiciembre',
Jis2Nota = '$jis2Nota', Jis2Recup = '$jis2Recup', ColoqFebrero = ' $coloqFebrero'
               WHERE Id='$id'";
     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>