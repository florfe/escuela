<?php
function Listar_Horario_ingreso($vConexion){

    $Listado=array();
    
    $SQL="SELECT  distinct hor.Id, hor.Horario_ingreso, hor.Horario_salida
FROM   horarios as hor
order by hor.Horario_ingreso, hor.Horario_salida
LIMIT 0,8 ";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        
    $Listado[$i]['HORARIO_INGRESO']=$data['Horario_ingreso'];
    $i++;
        }

        return $Listado;
}

?>