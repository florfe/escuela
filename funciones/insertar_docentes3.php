<?php

function InsertarDocentes3($vConexion)
{

$docente = $_POST['Docentes'];
$escal = $_POST['Escalafon'];
 $cargo = $_POST['Cargo'];
$SQL_Insert = "UPDATE docentes SET Escalafon='$escal', Cargo='$cargo'
        WHERE Id='$docente' ";
if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;

}
?>
