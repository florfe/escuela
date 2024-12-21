<?php
function Listar_Materiasor($vConexion){

    $Listado=array();
    
    $SQL="SELECT distinct * FROM materiasorientado ORDER BY Nombre";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        
    $Listado[$i]['NOMBRE']=$data['Nombre'];
    $i++;
        }

        return $Listado;
}

?>