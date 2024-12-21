<?php
function Listar_VinculoAlumnos($vConexion){
    $Listado=array();
    $SQL="SELECT Id, Denominacion FROM vinculo";
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