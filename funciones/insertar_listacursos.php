<?php 
function InsertarListaCursos($vConexion){
    


$SQL_Insert="INSERT INTO listacursos (Curso, Division, Turno, Ciclo)
VALUES ('".$_POST['Curso']."', '".$_POST['Division']."', '".$_POST['Turno']."','".$_POST['Ciclos']."')";



    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>