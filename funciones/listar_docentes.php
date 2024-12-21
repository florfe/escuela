<?php
function Listar_Docentes($vConexion){
    $Listado=array();
    $SQL="SELECT Id, Nombre, Apellido FROM docentes ORDER BY Apellido";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['NOMBRE']=$data['Nombre'];
    $Listado[$i]['APELLIDO']=$data['Apellido'];
    $i++;
        }
        return $Listado;
}
?>