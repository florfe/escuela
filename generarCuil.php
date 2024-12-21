<?php 

if(isset( $_GET['dni'] ) && isset( $_GET['sexo'] ) ) 
{ 
$dni=$_GET['dni']; 
$sexo=$_GET['sexo']; 

if( $sexo == 1 ) 
//si es masculino 
$Primero = '20'; 
else if( $sexo == 2 ) 
//si es femenino 
$Primero = '27'; 
else 
//si es sociedad 
$Primero = '30'; 

$multiplicadores = Array('3', '2', '7','6', '5', '4', '3', '2'); 
$calculo = (substr($Primero,0,1)*5)+(substr($Primero,1,1)*4); 

for($i=0;$i<8;$i++) { 
$calculo += substr($dni,$i,1) * $multiplicadores[$i]; 
} 

$resto = ($calculo)%11; 

if( ( $sexo!='3' ) && ( $resto<=1 ) ){ 
if($resto==0){ 
$C = '0'; 
} else { 
if($sexo==1){ 
$C = '9'; 
} else { 
$C = '4'; 
} 
} 
$Primero = '23'; 
} else { 
$C = 11-$resto; 
} 

echo $cuil_cuit = $Primero.$dni.$C;	
} 
?>