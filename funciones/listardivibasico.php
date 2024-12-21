<?php
function Listar_Division($vConexion){

    $Listado=array();
    
    $SQL="SELECT * FROM division WHERE (Denominacion = 'A'||Denominacion = 'B' ||Denominacion = 'C')
    ORDER BY Denominacion";
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