<?php
function Listar_Cursos($vConexion){

    $Listado=array();
    
    $SQL="SELECT  distinct IdCurso, Id, IdDivision, IdTurno FROM alumnos ORDER BY IdCurso";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['IDCURSO']=$data['IdCurso'];
    $Listado[$i]['IDDIVISION']=$data['IdDivision'];
    $Listado[$i]['IDTURNO']=$data['IdTurno'];
    $i++;
        }

        return $Listado;
}

?>