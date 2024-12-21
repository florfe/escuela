<?php 
function InsertarNotas($vConexion){
 $SQL_Insert = "INSERT INTO notasfinal (IdAlumnos, Curso, Materias, ColoqDiciembre) 
                   VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($vConexion, $SQL_Insert);

if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssss', $idAlumno, $curso, $materia, $coloqDiciembre, $coloqFebrero, $final);

        for ($i = 0; $i < count($_POST['IdAlumnos']); $i++) {
            $idAlumno = isset($_POST['IdAlumnos'][$i]) ? $_POST['IdAlumnos'][$i] : '';
            $curso = isset($_POST['Curso']) ? $_POST['Curso'] : '';
            $materia = isset($_POST['Materias']) ? $_POST['Materias'] : '';
            $coloqDiciembre = isset($_POST['ColoquioDiciembre'][$i]) ? $_POST['ColoquioDiciembre'][$i] : '';
           $coloqFebrero = isset($_POST['ColoquioFebrero'][$i]) ? $_POST['ColoquioFebrero'][$i] : '';
            $final = isset($_POST['Final'][$i]) ? $_POST['Final'][$i] : '';


           
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