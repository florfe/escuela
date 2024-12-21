<?php
//aqui tengo parametros por defecto, cuando la llame con parentesis vacios, usarà estos:
function ConexionBD($Host = 'localhost' ,  $User = 'root',  $Password = '', $BaseDeDatos='wepipem' ) {
    //procedo al intento de conexion con esos parametros
    $linkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);
    if ($linkConexion!=false) {
        mysqli_set_charset($linkConexion,"utf8");
        return $linkConexion;
   } else {
        die ('No se pudo establecer la conexión.');
   }
}
?>
