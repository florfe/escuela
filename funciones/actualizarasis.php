<?php
function ActualizarDocentes($vConexion) {
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
        
    $esta=$_POST['fecha'];
       $dep=$_POST['asistencia'];

//1) genero la consulta que deseo
    $SQL = "UPDATE asistenciadoc SET EstadoAsis='$dep'
               WHERE IdDocente='$id'";
     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>