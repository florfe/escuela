<?php
function ActualizarAlumnos($vConexion) {

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
      $curso=$_POST['curso'];
    $division=$_POST['division'];
      $turno=$_POST['turno'];
    $ciclo=$_POST['ciclo'];
      
    
    
    //1) genero la consulta que deseo
    $SQL = "UPDATE alumnos SET Nombre='$nombre', Apellido='$apellido', IdCurso='$curso', IdTurno='$turno', IdDivision='$division', IdCiclo='$ciclo'
       
        WHERE Id='$id'";

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>