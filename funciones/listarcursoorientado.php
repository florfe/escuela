<?php
function Listar_Cursobasico($vConexion){

    $Listado=array();
    
    $SQL="SELECT * FROM curso 
 WHERE (Denominacion = '4'||Denominacion = '5' ||Denominacion = '6')
    ORDER BY Denominacion
    ";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        
    $Listado[$i]['DENOMINACION']=$data['Denominacion'];
    $i++;
        }

        return $Listado;
}

?>