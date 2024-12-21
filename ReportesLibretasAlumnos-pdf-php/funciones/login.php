<?php 
function DatosLogin($vUsuario, $vPassword, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT Id, Nombre, Apellido, dni.NumeroDni FROM docentes, dni 
     WHERE NumeroDni='$vDni'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['ID'] = $data['Id'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
        
         
    }
    return $Usuario;
}





?>