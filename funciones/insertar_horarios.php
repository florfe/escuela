<?php 
function InsertarHorarios($vConexion){
    
    $SQL_Insert="INSERT INTO horarios (horario, dia)
    VALUES ('".$_POST['Horario']."', '".$_POST['Dia']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>