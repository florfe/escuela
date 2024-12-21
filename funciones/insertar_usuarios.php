<?php 
function InsertarUsuarios($vConexion){
    
    $SQL_Insert="INSERT INTO docentes (Nombre, Apellido, FechaNacimiento)
    VALUES ('".$_POST['Nombre']."', '".$_POST['Apellido']."', '".$_POST['FechaNacimiento']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>