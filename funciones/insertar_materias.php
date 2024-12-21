<?php 
function InsertarMaterias($vConexion){

    $SQL_Insert="INSERT INTO materias (Nombre, IdCurso, IdDivision, IdTurno)
    VALUES ('".$_POST['Nombre']."', '".$_POST['IdCurso']."', '".$_POST['IdDivision']."', '".$_POST['IdTurno']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>