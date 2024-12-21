<?php
function Listar_Puntos($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM puntos ORDER BY Puntos";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['PUNTOS']=$data['Puntos'];
    $i++;
        }
        return $Listado;
}
?>