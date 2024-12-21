<?php 
function InsertarHora($vConexion){
    


$SQL_Insert="INSERT INTO cursoscompletos (Hora)
VALUES ('".$_POST['Hora']."')";



    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>