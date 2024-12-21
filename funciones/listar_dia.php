<?php
function Listar_Dia($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM dia ORDER BY Id";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['DIA']=$data['Dia'];
    $i++;
        }
        return $Listado;
}
?>