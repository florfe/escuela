<?php 
function DatosDniLoguin($vDni, $vConexion){
    $Alumno=array();
    
    $SQL="SELECT  Nombre, Apellido, NumeroDni, IdCurso, IdTurno, IdDivision, IdCiclo FROM alumnos 
     WHERE NumeroDni='$vDni'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
     
        $Alumno['NOMBRE'] = $data['Nombre'];
        $Alumno['APELLIDO'] = $data['Apellido'];
        $Alumno['NUMERODNI'] = $data['NumeroDni'];
        $Alumno['IDCURSO'] = $data['IdCurso'];
         $Alumno['IDTURNO'] = $data['IdTurno'];
          $Alumno['IDDIVISION'] = $data['IdDivision'];
           $Alumno['IDCICLO'] = $data['IdCiclo'];
    }
    return $Alumno;
}

?>