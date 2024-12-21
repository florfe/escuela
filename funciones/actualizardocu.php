<?php
function ActualizarDocentes($vConexion) {
    $id=$_POST['id'];
        $dni=$_POST['dni'];
    $cons=$_POST['constancia'];
    $tit=$_POST['titulo'];
    $apto=$_POST['apto'];
    $reg=$_POST['regimen'];
    $art=$_POST['art'];
    $vac=$_POST['vacunas'];
    $delit=$_POST['delitos'];
    //1) genero la consulta que deseo
    $SQL = "UPDATE entrega SET CopiaDni='$dni', ConstanciaServ='$cons', RegimenIncomp='$reg', CertifDelitSex='$delit', TituloDoc=' $tit', AptoPsicofis='$apto', ArtCarnet='$art', CopiaVac='$vac'
               WHERE IdDocente='$id'";
     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>