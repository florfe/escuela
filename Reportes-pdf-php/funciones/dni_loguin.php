<?php 
function DatosDniLoguin($vDni, $vConexion){
    $Docente=array();
    
    $SQL="SELECT  Nombre, Apellido, NumeroDni FROM docentes 
     WHERE NumeroDni='$vDni'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Docente['NOMBRE'] = $data['Nombre'];
        $Docente['APELLIDO'] = $data['Apellido'];
        $Docente['NUMERODNI'] = $data['NumeroDni'];
       
    }
    return $Docente;
}

?>