<?php 
function DatosDniLoguin2($vDni, $vConexion){
    $Docente=array();
    $SQL="SELECT doc.Id, doc.Nombre, doc.Apellido, doc.NumeroDni, doc.Titulo, doc.Legajo, doc.Calle, doc.Numero, doc.Piso, doc.Departamento, doc.Barrio, doc.Escalafon, doc.Conceptos1, doc.Puntos1, doc.Conceptos2, doc.Puntos2, doc.Conceptos3, doc.Puntos3, doc.Conceptos4, doc.Puntos4, doc.Conceptos5, doc.Puntos5, doc.ConceptoGeneral, mat.Nombre  as Materias, mat.Docente
    FROM docentes doc, materias mat
    WHERE doc.NumeroDni='$vDni' and doc.Id=mat.Docente";
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Docente['NOMBRE'] = $data['Nombre'];
        $Docente['APELLIDO'] = $data['Apellido'];
        $Docente['NUMERODNI'] = $data['NumeroDni'];
        $Docente['TITULO'] = $data['Titulo'];
         $Docente['MATERIAS'] = $data['Materias'];
         $Docente['LEGAJO'] = $data['Legajo'];
         $Docente['CALLE'] = $data['Calle'];
        $Docente['NUMERO'] = $data['Numero'];
        $Docente['PISO'] = $data['Piso'];
        $Docente['DEPARTAMENTO'] = $data['Departamento'];
         $Docente['BARRIO'] = $data['Barrio'];
         $Docente['ESCALAFON'] = $data['Escalafon'];
         $Docente['CONCEPTOS1'] = $data['Conceptos1'];
          $Docente['PUNTOS1'] = $data['Puntos1'];
           $Docente['CONCEPTOS2'] = $data['Conceptos2'];
          $Docente['PUNTOS2'] = $data['Puntos2'];
           $Docente['CONCEPTOS3'] = $data['Conceptos3'];
          $Docente['PUNTOS3'] = $data['Puntos3'];
           $Docente['CONCEPTOS4'] = $data['Conceptos4'];
          $Docente['PUNTOS4'] = $data['Puntos4'];
           $Docente['CONCEPTOS5'] = $data['Conceptos5'];
          $Docente['PUNTOS5'] = $data['Puntos5'];
          $Docente['CONCEPTOGENERAL'] = $data['ConceptoGeneral'];
}
    return $Docente;
}
?>