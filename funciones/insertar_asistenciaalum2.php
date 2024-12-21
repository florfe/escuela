<?php 
function InsertarAsistencia($vConexion){

$alumnos = "SELECT Id, Nombre, Apellido FROM alumnos ORDER BY Apellido";

        

$SQL_Insert="INSERT INTO asistenciaalum (IdAlumnos, Fecha, EstadoAsis) VALUES ";
$grupo = 1;
$lista = mysqli_query($vConexion, $alumnos);
    while ($fila = mysqli_fetch_array($lista)) {
        $idAlumnos = $fila['Id'];
        $fecha = $_POST['Fecha'];

// Cambios aquí: Construye el nombre del radio button usando el ID del docente
     
$radioName = 'Falta' . $grupo;
$faltaSeleccionada = isset($_POST[$radioName]) ? $_POST[$radioName] : '';
$faltaSeleccionada = is_array($faltaSeleccionada) ? implode(',', $faltaSeleccionada) : $faltaSeleccionada;
    if (!empty($faltaSeleccionada)) {
$SQL_Insert .= "('$idAlumnos', '$fecha', '$faltaSeleccionada'),";
$grupo++;
}
}
// Elimina la coma final de la declaración SQL
    $SQL_Insert = rtrim($SQL_Insert, ',');
  
if (!mysqli_query($vConexion, $SQL_Insert)) {
        // Si hay un error, muestra un mensaje y finaliza la ejecución
      
die('<h4>Error al intentar insertar el registro.</h4>');
    }
  
return true;
}
?>