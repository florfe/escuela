<?php 
function DatosLogin($vUsuario, $vPassword, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT  Nombre, Apellido FROM docentes 
     WHERE Dni= '$vPassword'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
       
         
    }
    return $Usuario;
}





?>