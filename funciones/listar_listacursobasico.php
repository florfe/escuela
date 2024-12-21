<?php
function Listar_Listacursosbasico($vConexion){

    $Listado=array();
    
    $SQL="SELECT Id, Curso, Division, Turno FROM cursoscompletos
     WHERE Turno='Mañana'AND (Division = 'A'||Division = 'B' ||Division = 'C')
    ORDER BY Curso";
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