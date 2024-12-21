<?php 
function InsertarDocumentacion($vConexion){


$SQL_Insert="INSERT INTO entregaalum (IdAlumnos, CopiaDni, DniTutor, Partida, Vacunas, CopiaCuil, CuilTutor, FichaMed, SextoGrado, ConstanciaDoc, Provi, Definitivo) VALUES ('".$_POST['Alumnos']."','".$_POST['checkbox1']."','".$_POST['checkbox2']."','".$_POST['checkbox3']."','".$_POST['checkbox4']."','".$_POST['checkbox5']."','".$_POST['checkbox6']."','".$_POST['checkbox7']."','".$_POST['checkbox8']."','".$_POST['checkbox9']."','".$_POST['checkbox10']."','".$_POST['checkbox11']."')";
        

 if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}

?>