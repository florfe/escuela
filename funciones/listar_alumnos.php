<?php
function Listar_Alumnos($vConexion){
    $Listado=array();
    $SQL="SELECT Id, Nombre, Apellido, NumeroDni FROM alumnos ORDER BY Apellido";
    $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['NOMBRE']=$data['Nombre'];
    $Listado[$i]['APELLIDO']=$data['Apellido'];
    $Listado[$i]['NUMERODNI']=$data['NumeroDni'];
    $i++;
        }
        return $Listado;
}
?>