<?php
function Listar_EstadoAlumnos($vConexion){
    $Listado=array();
    $SQL="SELECT Id, Denominacion FROM estadoalumno";
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