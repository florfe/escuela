<?php
function Listar_Listacursos($vConexion){

    $Listado=array();
    
    $SQL="SELECT Id, Curso, Division, Turno FROM cursoscompletos ORDER BY Curso";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['CURSO']=$data['Curso'];
    $Listado[$i]['DIVISION']=$data['Division'];
    $Listado[$i]['TURNO']=$data['Turno'];
    $i++;
        }

        return $Listado;
}

?>