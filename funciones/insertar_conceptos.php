<?php 
function InsertarConceptos($vConexion){
$con1=$_POST['Conceptos1'];
$pun1=$_POST['Puntos1'];
$con2=$_POST['Conceptos2'];
$pun2=$_POST['Puntos2'];
$con3=$_POST['Conceptos3'];
$pun3=$_POST['Puntos3'];
$con4=$_POST['Conceptos4'];
$pun4=$_POST['Puntos4'];
$con5=$_POST['Conceptos5'];
$pun5=$_POST['Puntos5'];
$congen=$_POST['ConceptoGeneral'];
$docente=$_POST['Docentes'];
$SQL_Insert="UPDATE docentes SET Conceptos1='$con1', Puntos1='$pun1', Conceptos2='$con2', Puntos2='$pun2', Conceptos3='$con3', Puntos3='$pun3', Conceptos4='$con4', Puntos4='$pun4', Conceptos5='$con5', Puntos5='$pun5',
    ConceptoGeneral='$congen'
        WHERE Id='$docente'";
    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>