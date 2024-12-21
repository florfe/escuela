<?php 
function InsertarAcademicoAlumnos($vConexion){
$legajo=$_POST['Legajo'];
$turno=$_POST['Turno'];
$ciclo=$_POST['Ciclos'];
$division=$_POST['Division'];
$situacion=$_POST['Situacion'];
$alumnos=$_POST['Alumnos'];
$curso=$_POST['Curso'];
$discapacidad=$_POST['Discapacidad'];
    $SQL_Insert="UPDATE alumnos SET Legajo='$legajo', IdTurno='$turno', IdCiclo='$ciclo', IdDivision='$division', IdCurso='$curso', IdSituacion='$situacion', IdDiscapacidad='$discapacidad'
        WHERE Id='$alumnos'";
 if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>