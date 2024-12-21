<?php
function Listar_Notas($vConexion){

    $Listado=array();
    
    $SQL="SELECT  Id, Nota FROM evaluacion";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['NOTA']=$data['Nota'];
    
    $i++;
        }

        return $Listado;
}

?>