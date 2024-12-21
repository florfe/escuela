<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sistemadegestionpp3@gmail.com';                     //SMTP username
    $mail->Password   = 'sistemapp3';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('florferrer987@gmail.com', 'Florcita');
    $mail->addAddress('florferrer987@gmail.com');     //Add a recipient
   

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto';
    $mail->Body    = 'Correo de prueba!</b>';
    

    $mail->send();
    echo 'Mensaje  enviado';
} catch (Exception $e) {
    echo "No se envio el mensaje: {$mail->ErrorInfo}";
    }