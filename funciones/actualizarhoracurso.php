<?php
function ActualizarAlumnos($vConexion) {

   
    $id=$_POST['id'];
      
    $hora=$_POST['hora'];
    $ingreso=$_POST['ingreso'];
      $salida=$_POST['salida'];
    $dia=$_POST['dia'];
     $mat=$_POST['materias'];
    
    //1) genero la consulta que deseo


   
    $SQL = "UPDATE hora 
       SET Hora='$hora', Horario_ingreso='$ingreso', Horario_salida='$salida', Dia='$dia', Materia='$mat'
              WHERE Id='$id'";

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>