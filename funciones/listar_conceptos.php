<?php
function Listar_Conceptos($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM conceptos ORDER BY Conceptos";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['CONCEPTOS']=$data['Conceptos'];
    $i++;
        }
        return $Listado;
}
?>