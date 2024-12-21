<?php 
function InsertarColoquios($vConexion){

$examen = "SELECT * FROM coloquios ";
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


 $fecha = $_POST['Fecha'];
$dayOfWeek = date('N', strtotime($fecha));
if ($dayOfWeek == 6 || $dayOfWeek == 7) {    
// Display an alert if the date is a Saturday or Sunday
echo '<script>alert("No se permite la carga para los días sábados o domingos.");</script>';
return false;  // Exit the function as attendance is not allowed on weekends
        }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $curso = $_POST['IdCurso'];
 $divi= $_POST['IdDivision'];
 $turno= $_POST['IdTurno'];
 $mate= $_POST['Materias'];
 $fech= $_POST['Fecha'];
 $hora= $_POST['Hora'];



        // Verificar si la fecha ya está en la base de datos
        $consultaExamenExistente = "SELECT COUNT(*) AS existe FROM coloquios WHERE Curso='$curso' and Division='$divi' and Turno='$turno' and Materia='$mate' and Fecha = '$fech' and Hora='$hora'";
        $resultadoExamenExistente = mysqli_query($vConexion, $consultaExamenExistente);
        $filaExamenExistente = mysqli_fetch_assoc($resultadoExamenExistente);

        if ($filaExamenExistente['existe'] > 0) {
            // Mostrar un mensaje si la fecha ya está cargada
            echo '<script>alert("El examen ya está registrado en la base de datos.");</script>';
            return false;  // Salir de la función porque la fecha ya está cargada
        }}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $curso = $_POST['IdCurso'];
 $divi= $_POST['IdDivision'];
 $turno= $_POST['IdTurno'];
 $mate= $_POST['Materias'];
 
        // Verificar si la fecha ya está en la base de datos
        $consultaExamenExistente = "SELECT COUNT(*) AS existe FROM coloquios WHERE Curso='$curso' and Division='$divi' and Turno='$turno' and Materia='$mate' ";
        $resultadoExamenExistente = mysqli_query($vConexion, $consultaExamenExistente);
        $filaExamenExistente = mysqli_fetch_assoc($resultadoExamenExistente);

        if ($filaExamenExistente['existe'] > 0) {
            // Mostrar un mensaje si la fecha ya está cargada
            echo '<script>alert("El curso y materia ya están registrados en un exámen en la base de datos.");</script>';
            return false;  // Salir de la función porque la fecha ya está cargada
        }}







    $SQL_Insert="INSERT INTO coloquios (Curso, Division, Turno, Materia, Fecha, Hora, Docente)
    VALUES ('".$_POST['IdCurso']."', '".$_POST['IdDivision']."', '".$_POST['IdTurno']."', '".$_POST['Materias']."', '".$_POST['Fecha']."', '".$_POST['Hora']."', '".$_POST['Docentes']."' )";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}}


?>