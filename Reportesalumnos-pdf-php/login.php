<?php 
function DatosLogin($vUsuario, $vPassword, $vConexion){
    $Usuario=array();
    
    $SQL="SELECT  Nombre, Apellido FROM alumnos 
     WHERE Dni= '$vPassword'";

    $rs = mysqli_query($vConexion, $SQL);
        
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
       
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
       $Usuario['CURSO'] = $data['Curso'];
         $Usuario['TURNO'] = $data['Turno'];
          $Usuario['DIVISION'] = $data['Division'];
           $Usuario['CICLO'] = $data['Ciclo'];
         
    }
    return $Usuario;
}





?>