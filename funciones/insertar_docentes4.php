<?php

function InsertarDocentes4($vConexion)
{

$docente = $_POST['Docentes'];
$cursos = $_POST['Curso'];
 $materias = $_POST['Materias'];
$division = $_POST['Division'];
$turno = $_POST['Turno'];
$est = $_POST['Estado'];  

 
$SQL_Insert = "UPDATE materiasorientado SET Docente='$docente', Estado='$est'
        WHERE Nombre='$materias' and IdCurso='$cursos' and IdDivision='$division'and IdTurno='$turno' ";
if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;

}
?>
