<?php
function Listar_materias2($vConexion){

    $Listado=array();
    
    $SQL="SELECT distinct Materia, IdCurso, Id FROM hora
     WHERE IdCurso=2
    ";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        
        
    $Listado[$i]['MATERIA']=$data['Materia'];
    
    $i++;
        }

        return $Listado;
}

?>