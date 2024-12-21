<?php 
function DatosDniLoguin($vDni, $vCurso, $vDivision, $vTurno, $vMaterias, $vConexion){
    $Docente=array();
    
    $SQL="SELECT  doc.Id, doc.Nombre, doc.Apellido, doc.NumeroDni, 
    mat.Docente, mat.IdCurso, mat.IdDivision, mat.IdTurno, mat.Nombre as Materias
    FROM docentes doc, materias mat
    WHERE mat.Docente=doc.Id and  doc.NumeroDni='$vDni' AND mat.IdCurso='$vCurso' AND mat.IdDivision='$vDivision' AND  mat.IdTurno='$vTurno' and mat.Nombre='$vMaterias' ";


    $rs = mysqli_query($vConexion, $SQL);
        if (!$rs) {
    die('Error in the query: ' . mysqli_error($vConexion));
    }
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Docente['NOMBRE'] = $data['Nombre'];
        $Docente['APELLIDO'] = $data['Apellido'];
        $Docente['NUMERODNI'] = $data['NumeroDni'];
        $Docente['IDCURSO'] = $data['IdCurso'];
         $Docente['IDDIVISION'] = $data['IdDivision'];
          $Docente['IDTURNO'] = $data['IDTurno'];
           
            $Docente['MATERIAS'] = $data['Materias'];
    }
    return $Docente;
}

?>