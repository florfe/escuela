<?php 
session_start();

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$Mensaje='';
if(!empty($_POST['BotonLogin'])){
    require_once 'funciones/login.php';
  
 $UsuarioLogueado = DatosLogin($_POST['email'], $_POST['password'], $MiConexion);
       
if(!empty($UsuarioLogueado) ){
      $_SESSION['Usuario_Nombre']= $UsuarioLogueado['NOMBRE'];
      $_SESSION['Usuario_Apellido']= $UsuarioLogueado['APELLIDO'];
      $_SESSION['Usuario_Area']= $UsuarioLogueado['AREA'];
      $_SESSION['Usuario_Imagen']= $UsuarioLogueado['IMAGEN'];
      
if($UsuarioLogueado['ACTIVO']==0){
  $Mensaje= 'No se encuentra activo.'; } else  

        if($UsuarioLogueado['ACTIVO']==1 && $UsuarioLogueado['AREA']==1) { header('location: menuprincipal2.php');
      exit; }  else  
        if($UsuarioLogueado['ACTIVO']==1 && $UsuarioLogueado['AREA']==6) { header('location: menuprincipal2.php');
      exit; }  else 
       if($UsuarioLogueado['ACTIVO']==1 && $UsuarioLogueado['AREA']==2) { header('location: menuprincipal.php');
      exit; } else 
       if($UsuarioLogueado['ACTIVO']==1 &&$UsuarioLogueado['AREA']==3) { header('location: menuprincipal4.php');
      exit; } else 
       if($UsuarioLogueado['ACTIVO']==1 && $UsuarioLogueado['AREA']==4 ) { header('location: menuprincipal3.php');
      exit; } else 
        if($UsuarioLogueado['ACTIVO']==1 && $UsuarioLogueado['AREA']==5 ) { header('location: menuprincipal5.php');
      exit; } } else
    {  
      $Mensaje='Datos incorrectos.'; }
     }

$Mensaje2 = '';
 if (!empty($_POST['Reset'])) {
   //require_once 'funciones/login2.php';
  $email = $_POST['email2'];
  $respuesta = $_POST['respuesta2'];
  $query = "SELECT * FROM usuarios WHERE Email = '$email' AND Respuesta = '$respuesta'";
$result = mysqli_query($MiConexion, $query);
 
if ($result && mysqli_num_rows($result) > 0) {
//require_once 'password_compat-master/lib/password.php';

$numero_aleatorio = mt_rand();

//$newPassword = generateRandomPassword(); // Implementa esta función
//$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

 $updateQuery = "UPDATE usuarios SET Clave = '$numero_aleatorio' WHERE Email = '$email'";


mysqli_query($MiConexion, $updateQuery);

$Mensaje2 = "Tu  contraseña ha sido reseteada. La nueva contraseña es: $numero_aleatorio.  Copia la clave y cambiala!!";
  } else {
$Mensaje2 = "La contraseña y/o el DNI son incorrectos.";
  }

}
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
      <div class="login-box " style="height: 670px">
         <form class="login-form" method="post">
<img src="img/logo.png" alt="" class="img_Ipem"/>
          <h3 >INGRESA AL SISTEMA</h3>
                <div class="bs-component"> 
            <div class="alert alert-dismissible alert-info">
             <strong>Ingresa tus datos</strong>
            </div>
          </div>
          <div class="form-group"> 
            <label class="control-label">USUARIO</label>
            <input class="form-control" placeholder="&#128272; Email" name="email"  type="email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" placeholder="&#128272; Password" name="password"  type="password" >
          </div>
          <div class="form-group">
                       <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
            </div>
            <div class="utility">
              <p class="semibold-text mb-2"><a href="cambiarClave.php" >Cambiar clave</a></p>
            </div>
          <div class="utility">
              <p class="semibold-text mb-2"><a href="index.php" >Salir</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block" name="BotonLogin" value="Login"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button><img  src= "icon/f2a7569527e9b01b3486bdc7e96d3a-unscreen.gif" style="width:20%;  position: absolute; top:66%; right:50%" />
          </div>
          <hr></hr>
              <div class="bs-component">  
            <?php if (!empty ($Mensaje)) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <?php echo $Mensaje; ?>
                              </div>
                            <?php } ?>
          </div>
 <div class="bs-component">
              <?php if (!empty ($Mensaje2)) { ?>
                                <div class="alert alert-success alert-dismissable">
                                 <strong><?php echo $Mensaje2; ?></strong>
                                </div>
                            <?php } ?>
                           
          </div>

        </form>
        

        <form  class="forget-form" method="post" >
          <img src="img/logo.png" alt="" class="img_Ipem"/>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>

         

          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Tu clave será reseteada</strong>
            </div>
          </div>
         
        
          <div class="form-group">

            <label class="control-label">Ingresa tu correo</label>
            <input type="email" class="form-control" name="email2" >
          </div> 
          <div class="form-group">
            <label class="control-label">Ingresa tu DNI</label>
            <input  type="password" class="form-control" name="respuesta2" >
          </div> 
          <div class="form-group btn-container ">
          <button class="btn btn-primary btn-block" type="submit" name="Reset" id="Reset" value="Reset">RESET</button>
            
          </div>
  
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="login.php" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
            <img  src= "icon/VjWC-unscreen.gif" style="width:50%;  position: absolute; right:30%" />
          </div>
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