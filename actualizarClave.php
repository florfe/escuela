<?php
include('funciones/conexion.php');
$MiConexion= ConexionBD();
$id 		    = $_REQUEST['Id'];
$tokenUser 		= $_REQUEST['tokenUser'];
$password       = $_REQUEST['Clave'];

$updateClave    = ("UPDATE usuarios SET Clave='$password' WHERE Id='".$id."' AND tokenUser='".$tokenUser."' ");
$queryResult    = mysqli_query($MiConexion,$updateClave); 

?>

<meta http-equiv="refresh" content="0;url=login.php?email=1"/>