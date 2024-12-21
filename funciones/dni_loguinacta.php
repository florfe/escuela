<?php 
function DatosDniLoguinacta($vMaterias, $vCurso, $vDivision, $vTurno, $vConexion){
    $Alumno=array();
    
  
 $SQL="SELECT col.Id, col.Curso, col.Turno, col.Division, col.Materia, col.Fecha, col.Hora, col.Docente, doc.Id, doc.Nombre, doc.Apellido 
 FROM coloquiosdic as col, docentes as  doc 
 WHERE col.Materia='$vMaterias' and col.Curso='$vCurso' and col.Division='$vDivision'  and  col.Turno='$vTurno' and col.Fecha >'01/11/2023' and col.Docente=doc.Id";



    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {

        $Alumno['NOMBRE'] = $data['Nombre'];
        $Alumno['APELLIDO'] = $data['Apellido'];
        $Alumno['MATERIA'] = $data['Materia'];
        $Alumno['CURSO'] = $data['Curso'];
        $Alumno['DIVISION'] = $data['Division'];
         $Alumno['TURNO'] = $data['Turno'];
           $Alumno['FECHA'] = $data['Fecha'];
}
    return $Alumno;
}

?>