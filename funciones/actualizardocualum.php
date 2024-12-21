<?php
function ActualizarAlumnos($vConexion) {

    $id=$_POST['id'];
     
    $copiaDni=$_POST['copiaDni'];
     $dniTutor=$_POST['dniTutor'];

    $partida=$_POST['partida'];
    $vacunas=$_POST['vacunas'];
    $copiaCuil=$_POST['copiaCuil'];
    $cuilTutor=$_POST['cuilTutor'];

    $fichaMed=$_POST['fichaMed'];
    $sextoGrado=$_POST['sextoGrado'];
    $constanciaDoc=$_POST['constanciaDoc'];
    $provi=$_POST['provi'];
    $definitivo=$_POST['definitivo'];




    //1) genero la consulta que deseo
    $SQL = "UPDATE entregaalum SET CopiaDni='$copiaDni', DniTutor='$dniTutor', Partida='$partida', Vacunas='$vacunas', CopiaCuil='$copiaCuil', CuilTutor=' $cuilTutor', FichaMed='$fichaMed', SextoGrado='$sextoGrado', ConstanciaDoc='$constanciaDoc', Provi='$provi', Definitivo='$definitivo'
               WHERE IdAlumnos='$id'";

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>