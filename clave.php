<?php 
session_start();

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$Mensaje='';
if(!empty($_POST['btnResetearClave'])){
    require_once 'funciones/clave.php';
$UsuarioLogueado = DatosLogin($_POST['email'], $_POST['password'], $MiConexion);
if($UsuarioLogueado['ACTIVO']==1){
        $Mensaje= 'Listo! Ya puedes loguearte';
      }
      else{
$Mensaje='El mail ingresado no existe';
      
    }

    }
    

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>LOGIN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
<form class="forget-form" method="post" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
          <div class="bs-component">
             <?php if (!empty ($Mensaje)) { ?>
            <div class="alert alert-dismissible alert-info">
              <?php echo $Mensaje; ?>
            </div>
               <?php } ?>
          </div>
         
          <div class="bs-component">
             <?php if (!empty ($Mensaje)) { ?>
            <div class="alert alert-dismissible alert-danger">
              <?php echo $Mensaje; ?>
            </div>
               <?php } ?>
          </div>
        

         
          
          <div class="form-group">
            <label class="control-label">Ingresa tu correo</label>
            <input class="form-control" placeholder="Email">
          </div>
          <div class="form-group btn-container ">
            <button class="btn btn-primary btn-block" type='submit' name='btnResetearClave' value='dadfa'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
          </div>
        </form>
        </body>
    



                            
                        
</html>