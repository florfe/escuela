<?php 
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->   
    <link rel="stylesheet" type="text/css" href="css/menuprincipal.css">
     <link rel="stylesheet" type="text/css" href="css/rol.css"> 
    <title>MENU PRINCIPAL</title>  
  </head>
  <body>
   <section >
         <a class="button" href="login.php">CAMBIAR ROL DE USUARIO</a>  
      <img src="img/fondo.png" alt="" class="banner__img">
      <img src="img/logo.png" alt="" class="banner2__img"> 
   <a class="button" >CAMBIAR ROL DE USUARIO</a>  
          <h1 >Debes seleccionar una opcion.</h1>
         <p style="font-color:black"> Si cumples el rol de Administrador/a o Secretario/a, tendras acceso a todas las Gestiones.</p>
            <p> Si cumples el rol de Prosecretario/a, tendras acceso a la Gestion Materias y Examenes. </p>
            <p> Si cumples el rol de Coordinador/a, tendras acceso a la Gestion Alumnos, Cursos y Materias.</p>
            <p> Si cumples el  rol de Secretario/a de Despacho de Alumnos, tendras acceso a la  Gestion Cursos y Materias. </p>
            <p> Si cumples el rol de Preceptor/a, tendras acceso a la Gestion Cursos y Materias.</p>
   
       
           
            
<div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href='javascript:history.back(1)'>Regresar</a></p>
            <img  src= "icon/VjWC-unscreen.gif" style="width:50%;  position: absolute; right:30%" />
          </div>
    </section>
  </body>
</html>