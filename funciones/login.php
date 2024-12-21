<?php 
function DatosLogin($vUsuario, $vPassword, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT Id, Nombre, Apellido, IdArea, Imagen, Activo FROM Usuarios 
     WHERE Email='$vUsuario' AND Clave= '$vPassword'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['ID'] = $data['Id'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
        $Usuario['AREA'] = $data['IdArea'];
        if(empty($data['Imagen'])){
            $data['Imagen']='team-3.png';
        }
        $Usuario['IMAGEN'] = $data['Imagen'];
         $Usuario['ACTIVO'] = $data['Activo'];
         
    }
    return $Usuario;
}





?>