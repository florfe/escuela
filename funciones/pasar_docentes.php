
<?php
function Pasar_Docentes($vConexion) {

$idd=$_GET["idd"];
$docentes="SELECT *
        FROM docentes doc, dni dn 
        WHERE doc.Id='$idd'";

  if (!mysqli_query($vConexion, $docentes)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
        
   

?>