<?php

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
 
       $id=$_GET['id'];
    
    
    //1) genero la consulta que deseo
    $SQL = "DELETE from materias where Id='$id'";
    $resultadoEliminar = mysqli_query($MiConexion, $SQL);
   
if($resultadoEliminar){
   header("Location: materias1.php");
} else {
   echo"<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
}
     

    
?>
