<?php 
function InsertarDocumentacion($vConexion){
$SQL_Insert="INSERT INTO entrega (IdDocente, CopiaDni, ConstanciaServ, RegimenIncomp, CertifDelitSex, TituloDoc, AptoPsicofis, ArtCarnet, CopiaVac) VALUES ('".$_POST['Docentes']."','".$_POST['checkbox1']."','".$_POST['checkbox2']."','".$_POST['checkbox3']."','".$_POST['checkbox4']."','".$_POST['checkbox5']."','".$_POST['checkbox6']."','".$_POST['checkbox7']."','".$_POST['checkbox8']."')";
 if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>