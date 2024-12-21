<?php
function InsertarDni($vConexion){
    $SQL_Insert="INSERT INTO dni (IdTipo, NumeroDni,  FechaVencimiento)
    VALUES ('".$_POST['TipoDNI']."','".$_POST['NumeroDni']."','".$_POST['FechaVencimiento']."')";
    if (!mysqli_query($vConexion, $SQL_Insert)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>