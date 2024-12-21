<?php
function Listar_barrio($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM barrio ORDER BY Barrio";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['BARRIO']=$data['Barrio'];
    $i++;
        }
        return $Listado;
}
?>