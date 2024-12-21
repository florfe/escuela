<?php
function Listar_Cursos($vConexion){

    $Listado=array();
        $SQL="SELECT  distinct Curso, Id, Division, Turno, Ciclos FROM cursoscompletos ORDER BY Curso, Division, Turno";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
        $Listado[$i]['CURSO']=$data['Curso'];
    $Listado[$i]['DIVISION']=$data['Division'];
    $Listado[$i]['TURNO']=$data['Turno'];
     $Listado[$i]['CICLOS']=$data['Ciclos'];
    $i++;
        }

        return $Listado;
}

?>