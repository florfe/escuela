<?php
function Listar_PreviasAbril($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM previasabril ";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    

    $i++;
        }
        return $Listado;
}
?>