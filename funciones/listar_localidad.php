<?php
function Listar_localidad($vConexion){
    $Listado=array();
    $SQL="SELECT distinct Localidad, Id FROM localidad ORDER BY Localidad";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['LOCALIDAD']=$data['Localidad'];
    $i++;
        }
        return $Listado;
}
?>