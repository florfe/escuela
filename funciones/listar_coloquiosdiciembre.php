<?php
function Listar_ColoquiosDiciembre($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM coloquiosdic WHERE Fecha>'2023-04-01'";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    

    $i++;
        }
        return $Listado;
}
?>