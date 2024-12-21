<?php
include('funciones/conexion.php');
$MiConexion= ConexionBD();

$correo             = trim($_REQUEST['email']); //Quitamos algun espacion en blanco

$consulta           = ("SELECT * FROM usuarios WHERE Email ='".$correo."'");
$queryconsulta      = mysqli_query($MiConexion, $consulta);
$cantidadConsulta   = mysqli_num_rows($queryconsulta);
$dataConsulta       = mysqli_fetch_array($queryconsulta);

if($cantidadConsulta ==0){ 
    header("Location:login.php?errorEmail=1");
    exit();
}else{
    
function generandoTokenClave($length = 20) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz', ceil($length/strlen($x)) )),1,$length);
}
$miTokenClave     = generandoTokenClave();


//Agregando Token en la tabla BD
$updateClave    = ("UPDATE usuarios SET Clave='$clave' WHERE Email='".$correo."' ");
$queryResult    = mysqli_query($MiConexion,$updateClave); 


$linkRecuperar      = "https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/nuevaClave.php?Id=".$dataConsulta['Id']."&tokenUser=".$miTokenClave;

$destinatario = $correo; 
$asunto       = "Recuperando Clave";
$cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Recuperar Clave de Usuario</title>';
$cuerpo .= ' 
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 300;
        color: #888;
        background-color:rgba(230, 225, 225, 0.5);
        line-height: 30px;
        text-align: center;
    }
    .contenedor{
        width: 80%;
        min-height:auto;
        text-align: center;
        margin: 0 auto;
        background: #ececec;
        border-top: 3px solid #E64A19;
    }
    .btnlink{
        padding:15px 30px;
        text-align:center;
        background-color:#cecece;
        color: crimson !important;
        font-weight: 600;
        text-decoration: blue;
    }
    .btnlink:hover{
        color: #fff !important;
    }
    .imgBanner{
        width:100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding:0px;
    }
    .misection{
        color: #34495e;
        margin: 4% 10% 2%;
        text-align: center;
        font-family: sans-serif;
    }
    .mt-5{
        margin-top:50px;
    }
    .mb-5{
        margin-bottom:50px;
    }
    </style>
';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
    <img class="imgBanner" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/banner2.png">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/banner.jpg" width="100%">
        </td>
    </tr>
    
    <tr>
        <td style="background-color: #ffffff;">
            <div class="misection">
                <h2 style="color: red; margin: 0 0 7px">Hola, '.$dataConsulta['Nombre'].'</h2>
                <p style="margin: 2px; font-size: 18px">entra en el link para que puedas recuperar tu clave </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <a href='.$linkRecuperar.' class="btnlink">Recuperar mi clave</a>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/work.gif" width="100%">
                <p>&nbsp;</p>
            </div>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff;">
        <div class="misection">
            <h2 style="color: red; margin: 0 0 7px">Visitar Canal de Youtube</h2>
            <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/canal.png" width="100%">
        </div>
        
        <div class="mb-5 misection">  
          <p>&nbsp;</p>
            <a href="https://www.youtube.com/channel/UCodSpPp_r_QnYIQYCjlyVGA" class="btnlink">Visitar Canal </a>
        </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 0;">
            <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/footer.png" width="100%">
        </td>
    </tr>
</table>'; 

$cuerpo .= '
      </div>
    </body>
  </html>';
    
    $headers  = "MIME-Version: 5.4.3\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= "From: WebDeveloper\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    (mail($destinatario,$asunto,$cuerpo,$headers));

    header("Location:login.php?email=1");
    exit();
    

}

?>