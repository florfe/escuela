<?php
function Listar_tipoTel($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM telefono ORDER BY TipoTel";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['TIPOTEL']=$data['TipoTel'];
    $i++;
        }
        return $Listado;
}
?>