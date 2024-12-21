<?php
function Listar_EstadoAsis($vConexion){



    $Listado=array();
    
    $SQL="SELECT * FROM estadoasis ";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['ESTADOASIS']=$data['EstadoAsis'];
    $i++;
        }

        return $Listado;
}

?>