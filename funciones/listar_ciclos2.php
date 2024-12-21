<?php
function Listar_Ciclos($vConexion){
    $Listado=array();
    $SQL="SELECT DISTINCT Ciclos, Id FROM cursoscompletos";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        
    $Listado[$i]['CICLOS']=$data['Ciclos'];
    $i++;
        }
        return $Listado;
}
?>