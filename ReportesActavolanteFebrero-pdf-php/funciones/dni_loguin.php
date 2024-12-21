<?php 
function DatosDniLoguin($vIdCurso, $vDivision, $vTurno, $vConexion){
    $Alumno=array();
    
    $SQL="SELECT  Nombre, Apellido, NumeroDni, IdCurso, IdDivision, IdTurno FROM alumnos 
     WHERE IdCurso='$vIdCurso'  AND IdDivision='$vDivision' AND  IdTurno='$vTurno'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
     
        $Alumno['NOMBRE'] = $data['Nombre'];
        $Alumno['APELLIDO'] = $data['Apellido'];
        $Alumno['NUMERODNI'] = $data['NumeroDni'];
        $Alumno['IDCURSO'] = $data['IdCurso'];
         $Alumno['IDTURNO'] = $data['IdTurno'];
          $Alumno['IDDIVISION'] = $data['IdDivision'];
         
    }
    return $Alumno;
}

?>