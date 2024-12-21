<?php 
function InsertarRadio($vConexion){


$inasis=$_POST['Falta'];
foreach ($inasis as $key => $value) {
   $SQL = "UPDATE docentes SET EstadoAsis='$valor' WHERE Id='$id'  
   ";

 
}

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>