<?php
function Listar_Horario_salida($vConexion){
    $Listado=array();
    $SQL="SELECT * FROM horarios ORDER BY Id";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['HORARIO_SALIDA']=$data['Horario_salida'];
    $i++;
        }
        return $Listado;
}
?>