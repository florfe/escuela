<?php 
function InsertarCargo($vConexion){
    
$cargo=$_POST['Cargo'];

$docente=$_POST['Docentes'];



    $SQL_Insert="UPDATE docentes SET Cargo='$cargo'
        WHERE Id='$docente'";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>