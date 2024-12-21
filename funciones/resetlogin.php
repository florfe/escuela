<?php 
$destino = $_POST['email']; 
$contenido = "Email: " . $destino;
     mail($destino, "Contacto", $contenido);
     

?>