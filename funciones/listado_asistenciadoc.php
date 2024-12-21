<?php
function Listado_asistencia($vConexion){



    $Listado=array();
    
    $SQL="SELECT doc.Id, doc.Nombre, doc.Apellido, doc.NumeroDni as Dni, doc.IdCurso as Curso, doc.Division, doc.Turno
    FROM docentes ";
    $rs=mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['NOMBRE']=$data['Nombre'];
$Listado[$i]['APELLIDO']=$data['Apellido'];
$Listado[$i]['DNI']=$data['Dni'];
$Listado[$i]['CURSO']=$data['Curso'];
$Listado[$i]['DIVISION']=$data['Division'];
$Listado[$i]['TURNO']=$data['Turno'];



    $i++;
        }

        return $Listado;
}

?>