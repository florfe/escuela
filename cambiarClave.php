<?php 
session_start();

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();


$Mensaje2 = '';
 if (!empty($_POST['BotonLogin'])) {
   //require_once 'funciones/login2.php';
  $email = $_POST['email2'];
  $claveeNueva = $_POST['password1'];
  $cambiarClave = $_POST['password2'];
  $query = "SELECT * FROM usuarios WHERE Email = '$email' AND Clave = '$claveeNueva'";
$result = mysqli_query($MiConexion, $query);
 
if ($result && mysqli_num_rows($result) > 0) {
//require_once 'password_compat-master/lib/password.php';

$cambiarClave = $_POST['password2'];

//$newPassword = generateRandomPassword(); // Implementa esta función
//$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

 $updateQuery = "UPDATE usuarios SET Clave = '$cambiarClave' WHERE Email = '$email'";


mysqli_query($MiConexion, $updateQuery);

$Mensaje2 = "Tu  contraseña ha sido cambiada.";
  } else {
$Mensaje2 = "Los datos son incorrectos.";
  }
 
}
if (!empty($_POST['BotonLogin2'])) {
 header('location:login.php');
      exit;}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->   
    <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>Login</title>  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content"> 
      <div class="logo">
        <h1>Sistema de Gestión Escolar</h1>
      </div>
      <div class="login-box " style="height: 750px">
         <form class="login-form" method="post">
<img src="img/logo.png" alt="" class="img_Ipem"/>
          <h3 >CAMBIAR  LA  CLAVE</h3>
                <div class="bs-component"> 
            <div class="alert alert-dismissible alert-info">
             <strong>Ingresa tus datos</strong>
            </div>
          </div>

          <div class="bs-component">
              <?php if (!empty ($Mensaje2)) { ?>
                                <div class="alert alert-success alert-dismissable">
                                 <strong><?php echo $Mensaje2; ?></strong>
                                </div>
                            <?php } ?>
                           
          </div>
           <div class="form-group">

            <label class="control-label">Ingresa tu correo</label>
            <input type="email" class="form-control" name="email2" >
          </div> 

          <div class="form-group">
            <label class="control-label">CONTRASEÑA NUEVA</label>
            <input class="form-control" placeholder="&#128272; Password" name="password1"  type="password" >
          </div>
          <div class="form-group">
            <label class="control-label">CAMBIAR PASSWORD</label>
            <input class="form-control" placeholder="&#128272; Password" name="password2"  type="password" >
          </div>
         <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="login.php" ><i class="fa fa-angle-left fa-fw"></i> Cancelar</a></p>
            <img  src= "icon/show-police-badge-PA-md-nwm-v2-unscreen.gif" style="width:50%;  position: absolute; top:92%; right:1%" />
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block" name="BotonLogin" value="Login"><i class="fa fa-sign-in fa-lg fa-fw"></i>CAMBIAR CLAVE</button>
          </div><hr></hr>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block" name="BotonLogin2" value="Login"><i class="fa fa-sign-in fa-lg fa-fw"></i>VOLVER A INGRESAR</button>
          </div>
          <hr></hr>
             
 

        </form>
        

       
         
        
         
     
    </section>
      </div> 
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
</html>