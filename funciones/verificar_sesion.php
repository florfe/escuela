<?php
error_reporting(0);
session_start();
include('funciones/conexion.php');
if (isset($_SESSION['Email']) != "") {
    header("Location: ../login.php");
}


$Email 		= $_REQUEST['Email'];
$clave  		= $_REQUEST['clave'];

$sqlVerificando = ("SELECT * FROM usuarios WHERE Email='".$Email."' AND clave='".$clave."' ");
$QueryResul = mysqli_query($con,$sqlVerificando);

if ($row = mysqli_fetch_assoc($QueryResul)) {
	 $_SESSION['Nombre']	= $row['Nombre'];
	 $_SESSION['Email'] 	= $row['Email'];
	 $_SESSION['Id']		= $row['Id'];
	
	echo '<meta http-equiv="refresh" content="0;url=../login.php">';
}else{
	echo '<meta http-equiv="refresh" content="0;url=../login.php?emaiIncorrecto=1">';
}
?>