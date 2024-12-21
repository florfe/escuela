<?php 
function InsertarAsistencia($vConexion){


$id=$_POST['ID'];
$fecha=$_POST['fecha'];
$inasis=$_POST['inasis'];


 $SQL = "INSERT INTO asistenciaalum (IdAlumnos, Fecha, EstadoAsis)
  VALUES ($id, $fecha, $inasis)";
 

 
 
       
       

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>