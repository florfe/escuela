<?php 
function DatosAlumno( $vIdCurso, $vDivision, $vTurno, $vConexion){
    $Alumno=array();
    
    $SQL="SELECT  Nombre, Apellido, IdCurso, IdDivision, IdTurno FROM alumnos 
     WHERE IdCurso='$vIdCurso' AND IdDivision='$vDivision' AND  IdTurno='$vTurno' ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Alumno['NOMBRE'] = $data['Nombre'];
        $Alumno['APELLIDO'] = $data['Apellido'];
      
        $Alumno['IDCURSO'] = $data['IdCurso'];
         $Alumno['IDDIVISION'] = $data['IdDivision'];
          $Alumno['IDTURNO'] = $data['IdTurno'];
          
    }
    return $Alumno;
}

?>