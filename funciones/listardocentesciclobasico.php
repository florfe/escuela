<?php
function Listar_Docentes($vConexion){
    $Listado=array();
    $SQL="SELECT distinct doc.Id, doc.Nombre, doc.Apellido, mat.Docente 
    FROM docentes doc, materias mat 
    where doc.Id=mat.Docente 
    ORDER BY doc.Apellido";
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
