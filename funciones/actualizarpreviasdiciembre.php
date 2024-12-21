<?php
function ActualizarColoquios($vConexion) {
    $id=$_POST['id'];
    
    
    $mat=$_POST['materia'];
       
    $cur=$_POST['curso'];
    $esta=$_POST['fecha'];
 


   
    //1) genero la consulta que deseo
    $SQL = "UPDATE previasdiciembre SET Materia='$mat',Curso='$cur', Fecha='$esta'
               WHERE Id='$id'";
     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>