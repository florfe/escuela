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
      <title>MENU  PRINCIPAL</title>  
  </head>
  <body>
     <div class="ventana" id="vent">
      <div id="cerrar"><a href="javascript:cerrar()"><img src="img/cerrar.png" style="position:absolute; top:1px; right:1px;width:160%;"></a></div>
<h1 >Debes seleccionar una opcion.</h1>
         <p ><img src="img/lapiz.png" style="width:8%;"> Si cumples el rol de Administrador/a o Secretario/a, tendras acceso a todas las Gestiones.</p>
            <p><img src="img/lapiz.png" style="width:8%;"> Si cumples el rol de Prosecretario/a, tendras acceso a la Gestion Materias y Examenes. </p>
            <p><img src="img/lapiz.png" style="width:8%;"> Si cumples el rol de Coordinador/a, tendras acceso a la Gestion Alumnos, Cursos y Materias.</p>
            <p><img src="img/lapiz.png" style="width:8%;"> Si cumples el  rol de Secretario/a de Despacho de Alumnos, tendras acceso a la  Gestion Cursos y Materias. </p>
            <p><img src="img/lapiz.png" style="width:8%;"> Si cumples el rol de Preceptor/a, tendras acceso a la Gestion Cursos y Materias.</p>
</div>
   <section >
         <a class="button" href="login.php">CAMBIAR ROL DE USUARIO</a>  
      <img src="img/fondo.png" alt="" class="banner__img">
        <img src="img/logo.png" alt="" class="banner2__img"> 
             <a class="button1" title="NO  AUTORIZADO" href="#">ADMINISTRACIÓN DOCENTES</a>
  <img src="icon/7085a448cd78b1a87017901fa80a7a94.gif" alt="" class="seccion1__img"> 
<a class="button2" title="NO  AUTORIZADO" href="#">ADMINISTRACIÓN  EXÁMEN</a>
<img src="icon/gif-for-presentation-71.gif" alt="" class="seccion2__img">
  <a class="ayuda" href="javascript:abrir()">AYUDA</a><img src="icon/question-mark-serious-thinker--unscreen.gif"   class="seccion__img" >
 <a class="button3" title="INGRESA" href="principalmaterias.php">ADMINISTRACIÓN MATERIAS</a>
<img src="icon/c3fffbed1207d91467708b02a2713cfc.gif" alt="" class="seccion3__img">
 <a class="button4" title="NO  AUTORIZADO" href="#">ADMINISTRACIÓN ALUMNOS</a>
<img src="icon/eb331585b04925e75cd54defa28950-unscreen.gif" alt="" class="seccion4__img">
 <a class="button5" title="INGRESA" href="principalcursos.php">ADMINISTRACIÓN CURSOS</a>
<img src="icon/dbc76a0d33d49ea4b8185b27b03487-unscreen.gif" alt="" class="seccion5__img">
    </section>
     <script>
      function abrir(){
document.getElementById("vent").style.display="block";
      }
 function cerrar(){
document.getElementById("vent").style.display="none";
      }
</script>
   </body>
</html>