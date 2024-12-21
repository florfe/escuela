<?php
session_start();
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/login2.php';
$Mensaje2 = '';
if (!empty($_POST['Reset'])) {
    
  // Check if the email and security answer match
    $email = $_POST['email'];
  $respuesta = $_POST['respuesta'];

// Validate the security answer against the stored answer in the database
    
    
$query = "SELECT * FROM usuarios WHERE Email = '$email' AND Respuesta = '$respuesta'";
 
$result = mysqli_query($MiConexion, $query);

if ($result && mysqli_num_rows($result) > 0) {

// Security answer is correct, allow password reset
        
   
// Generate a new password and update it in the database
        
       
$newPassword = generateRandomPassword(); // Implement this function

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      
$updateQuery = "UPDATE usuarios SET Clave = '$hashedPassword' WHERE Email = '$email'";
 
  
mysqli_query($MiConexion, $updateQuery);

$Mensaje2 = "Tu  contraseña ha sido  reseteada. La nueva contraseña es: $newPassword";
    } 
     
else {
        
       

 
$Mensaje2 = "Respuesta de seguridad incorrecta.";
    }
}

  
?>
