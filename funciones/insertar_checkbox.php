<?php 
function InsertarCheckbox($vConexion){


$inasis=$_POST['inasis'];
foreach ($inasis as $key => $value) {
   $SQL = "INSERT INTO asistenciaalum SET EstadoAsis='$valor'  
   ";

 
 
}

 

 
       
       

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>