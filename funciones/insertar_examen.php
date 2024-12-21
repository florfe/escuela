<?php 
function InsertarExamen($vConexion){


$SQL_Insert="INSERT INTO examen (IdAlumnos, Curso,  Materias, Mesa) VALUES ('".$_POST['Alumnos']."','".$_POST['Curso']."','".$_POST['Materias']."','".$_POST['Mesa']."')";
        

 if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}

?>