<?php
function Listar_materias6hum($vConexion){

    $Listado=array();
    
     $SQL="SELECT  Nombre, IdCurso, IdDivision FROM materiasorientado
     WHERE IdCurso=6 and IdDivision='Humanidades'
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