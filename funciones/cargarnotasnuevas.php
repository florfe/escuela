<?php 
function InsertarNotasNuevas($vConexion){

$idAlumnos=$_POST['id'];
$curso = isset($_POST['Curso']) ? $_POST['Curso'] : '';
echo "Curso: " . $curso;

   $SQL_Insert = "INSERT INTO notas (IdAlumnos, Materias, Curso,
    Eval1Nota, Eval1Recup1, Eval1Recup2,
    Eval2Nota, Eval2Recup1, Eval2Recup2,
    Eval3Nota, Eval3Recup1, Eval3Recup2,
    Eval4Nota, Eval4Recup1, Eval4Recup2,
    Eval5Nota, Eval5Recup1, Eval5Recup2,
    Eval6Nota, Eval6Recup1, Eval6Recup2,
    Eval7Nota, Eval7Recup1, Eval7Recup2,
    Eval8Nota, Eval8Recup1, Eval8Recup2,
    Jis1Nota, Jis1Recup, Jis2Nota,
    Jis2Recup, ColoqDiciembre, ColoqFebrero
)
VALUES (
    '".$idAlumnos."',
    '".$_POST['Materias']."',
    '".$curso."', 
    '".$_POST['Eval1Nota']."', '".$_POST['Eval1Recup1']."', '".$_POST['Eval1Recup2']."', 
    '".$_POST['Eval2Nota']."', '".$_POST['Eval2Recup1']."', '".$_POST['Eval2Recup2']."', 
    '".$_POST['Eval3Nota']."', '".$_POST['Eval3Recup1']."', '".$_POST['Eval3Recup2']."', 
    '".$_POST['Eval4Nota']."', '".$_POST['Eval4Recup1']."', '".$_POST['Eval4Recup2']."', 
    '".$_POST['Eval5Nota']."', '".$_POST['Eval5Recup1']."', '".$_POST['Eval5Recup2']."', 
    '".$_POST['Eval6Nota']."', '".$_POST['Eval6Recup1']."', '".$_POST['Eval6Recup2']."', 
    '".$_POST['Eval7Nota']."', '".$_POST['Eval7Recup1']."', '".$_POST['Eval7Recup2']."', 
    '".$_POST['Eval8Nota']."', '".$_POST['Eval8Recup1']."', '".$_POST['Eval8Recup2']."', 
    '".$_POST['Jis1Nota']."', '".$_POST['Jis1Recup']."', '".$_POST['Jis2Nota']."', 
    '".$_POST['Jis2Recup']."', '".$_POST['ColoqDiciembre']."', '".$_POST['ColoqFebrero']."'
)";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>