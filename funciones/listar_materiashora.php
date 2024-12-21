<?php
function Listar_Listamaterias($vConexion){

    $Listado=array();
    
    $SQL="SELECT  distinct Materia, Id FROM hora ORDER BY Materia";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['MATERIA']=$data['Materia'];
    
    $i++;
        }

        return $Listado;
}

?>