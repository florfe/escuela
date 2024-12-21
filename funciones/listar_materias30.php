<?php
function Listar_materias3($vConexion){

    $Listado=array();
    
     $SQL="SELECT  Nombre, IdCurso, Id FROM materias
     WHERE IdCurso=3
    ";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        
        
    $Listado[$i]['NOMBRE']=$data['Nombre'];
    
    $i++;
        }

        return $Listado;
}

?>