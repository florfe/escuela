<?php 
function DatosDniLoguinpermiso($vDni, $vConexion){
    $Alumno=array();
    
    $SQL="SELECT Id, Nombre, Apellido, NumeroDni FROM alumnos 
     WHERE NumeroDni='$vDni' ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       $Alumno['ID'] = $data['Id'];
        $Alumno['NOMBRE'] = $data['Nombre'];
        $Alumno['APELLIDO'] = $data['Apellido'];
        $Alumno['NUMERODNI'] = $data['NumeroDni'];
          
    }
    return $Alumno;
}

?>