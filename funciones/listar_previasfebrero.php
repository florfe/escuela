<?php
function Listar_PreviasFebrero($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM previas ";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    

    $i++;
        }
        return $Listado;
}
?>