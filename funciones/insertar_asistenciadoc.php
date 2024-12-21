<?php 
function InsertarAsistencia($vConexion)
{
    $docentes = "SELECT Id, Nombre, Apellido FROM docentes ORDER BY Apellido";
    
    $SQL_Insert = "INSERT INTO asistenciadoc (IdDocente, Fecha, EstadoAsis) VALUES ";
  $grupo = 1;
  $lista = mysqli_query($vConexion, $docentes);
    while ($fila = mysqli_fetch_array($lista)) {
        $idDocente = $fila['Id'];
        $fecha = $_POST['Fecha'];

// Cambios aquí: Construye el nombre del radio button usando el ID del docente
     
 $radioName = 'Falta' . $grupo;
          $faltaSeleccionada = isset($_POST[$radioName]) ? $_POST[$radioName] : '';
$faltaSeleccionada = is_array($faltaSeleccionada) ? implode(',', $faltaSeleccionada) : $faltaSeleccionada;
    
         $SQL_Insert .= "('$idDocente', '$fecha', '$faltaSeleccionada'),";
              $grupo++;
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