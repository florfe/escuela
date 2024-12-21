<?php

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
       $id=$_GET['id'];
    
    
    //1) genero la consulta que deseo
    $SQL = "DELETE from materiasorientado where Id='$id'";
    $resultadoEliminar1 = mysqli_query($MiConexion, $SQL);
   
if($resultadoEliminar1){
   header("Location: listadomateriasciclos.php");
} else {
   echo"<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
}
     

    
?>