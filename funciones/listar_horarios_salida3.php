<?php
function Listar_Horario_salida($vConexion){

    $Listado=array();
    
    $SQL="SELECT  distinct hor.Id, hor.Horario_ingreso, hor.Horario_salida
FROM   horarios as hor

order by hor.Horario_ingreso, hor.Horario_salida
LIMIT 8,16";
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