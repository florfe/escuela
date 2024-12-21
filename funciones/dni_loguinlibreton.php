<?php 
function DatosDniLoguinLibreton($vCurso, $vDivision, $vTurno, $vConexion){
    $Alumno=array();
    
    $SQL="SELECT Curso, Division, Turno FROM cursoscompletos 
     WHERE Curso='$vCurso' AND Division='$vDivision' AND  Turno='$vTurno'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Alumno['CURSO'] = $data['Curso'];
        $Alumno['DIVISION'] = $data['Division'];
        $Alumno['TURNO'] = $data['Turno'];
          
    }
    return $Alumno;
}

?>