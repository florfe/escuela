<?php 
function DatosDniLoguin($vDni, $vIdCurso, $vDivision, $vTurno, $vMaterias, $vConexion){
    $Docente=array();
    
    $SQL="SELECT  Nombre, Apellido, NumeroDni, IdCurso, Division, Turno, Ciclo, Materias FROM docentes 
    WHERE NumeroDni='$vDni' AND IdCurso='$vIdCurso' AND Division='$vDivision' AND  Turno='$vTurno' AND Materias='$vMaterias' ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Docente['NOMBRE'] = $data['Nombre'];
        $Docente['APELLIDO'] = $data['Apellido'];
        $Docente['NUMERODNI'] = $data['NumeroDni'];
        $Docente['IDCURSO'] = $data['IdCurso'];
        $Docente['DIVISION'] = $data['Division'];
        $Docente['TURNO'] = $data['Turno'];
        $Docente['CICLO'] = $data['Ciclo'];
        $Docente['MATERIAS'] = $data['Materias'];
    }
    return $Docente;
}

?>