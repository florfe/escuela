<?php
function ActualizarMaterias($vConexion) {

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    
      $curso=$_POST['curso'];
    $division=$_POST['division'];
      $turno=$_POST['turno'];
 
      
    
    
    //1) genero la consulta que deseo
    $SQL = "UPDATE materias SET Nombre='$nombre',  IdCurso='$curso', IdTurno='$turno', IdDivision='$division'
       
        WHERE Id='$id'";

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>