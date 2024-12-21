<?php
include('funciones/conexion.php');
$id 		    = $_REQUEST['Id'];
$tokenUser 		= $_REQUEST['tokenUser'];
$clave       = $_REQUEST['Clave'];

$updateClave    = ("UPDATE usuarios SET Clave='$Clave' WHERE id='".$id."' AND tokenUser='".$tokenUser."' ");
$queryResult    = mysqli_query($con,$updateClave); 

?>

<meta http-equiv="refresh" content="0;url=login.php?email=1"/>