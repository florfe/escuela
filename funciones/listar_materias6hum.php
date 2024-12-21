<?php
function Listar_materias6hum($vConexion){

    $Listado=array();
    
    $SQL="SELECT distinct h.Materia, h.IdCurso, h.Id, c.Curso, c.Division FROM hora as h, cursoscompletos as c
     WHERE h.IdCurso=c.Curso AND c.Curso=6 AND c.Division='Humanidades'
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