<?php 
function DatosDniLoguin2($vDni, $vConexion){
    $Docente=array();
    
    $SQL="SELECT Nombre, Apellido, NumeroDni, Titulo, Materias, Legajo, Calle, Numero, Piso, Departamento, Escalafon, Conceptos1, Puntos1, Conceptos2, Puntos2, Conceptos3, Puntos3, Conceptos4, Puntos4, Conceptos5, Puntos5, ConceptoGeneral
    FROM docentes
     WHERE NumeroDni='$vDni' ";
          
    
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