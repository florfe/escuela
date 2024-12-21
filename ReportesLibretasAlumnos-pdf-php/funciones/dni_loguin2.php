<?php 
function DatosDniLoguin($vDni, $vConexion){
    $Alumno=array();
    
    $SQL="SELECT  alu.Id, alu.Nombre, alu.Apellido, alu.NumeroDni, alu.IdCurso, alu.IdDivision, alu.IdTurno, alu.IdCiclo, ntas.Materias
    FROM alumnos as alu
    
     WHERE   alu.NumeroDni='$vDni'   ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
     
        $Alumno['NOMBRE'] = $data['Nombre'];
        $Alumno['APELLIDO'] = $data['Apellido'];
        $Alumno['NUMERODNI'] = $data['NumeroDni'];
        $Alumno['IDCURSO'] = $data['IdCurso'];
        $Alumno['IDDIVISION'] = $data['IdDivision'];
        $Alumno['IDTURNO'] = $data['IdTurno'];
        $Alumno['IDCICLO'] = $data['IdCiclo'];
        


    }
    return $Alumno;
}

?>