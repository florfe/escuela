<?php 
function DatosLogin($vUsuario, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT Activo FROM Usuarios 
     WHERE Email='$vUsuario' ";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        
       
         $Usuario['ACTIVO'] = $data['Activo'];
    }
    return $Usuario;
}

?>