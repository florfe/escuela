<?php
function ActualizarAlumnos($vConexion) {

   
    $id=$_POST['idCurso'];
     $hor=$_POST['denominacion']; 
    $ingreso=$_POST['ingreso'];
      $salida=$_POST['salida'];
    $dia=$_POST['dia'];
    $materia= $_POST['materias'];
    
    
    //1) genero la consulta que deseo


   
    $SQL =  "UPDATE hora 
       SET Materia='$materia'
       WHERE  IdCurso='$id' AND Hora='$hor' ";

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>