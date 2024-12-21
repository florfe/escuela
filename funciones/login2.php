<?php
function generateRandomPassword($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
$password = '';


for ($i = 0; $i < $length; $i++) {
     
$password .= $characters[rand(0, strlen($characters) - 1)];
    }
   
return $password;
}
?>