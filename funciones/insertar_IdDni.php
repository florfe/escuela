<?php
function InsertarIdDni($vConexion){
    
    $dni=$_POST['NumeroDni'];

$docente=$_POST['Docentes'];

    $SQL_Insert="UPDATE docentes SET IdDni 
        WHERE Id='$dni'";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}

?>