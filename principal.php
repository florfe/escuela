<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/select_docentes.php'; 
$ListadoDocentes=Listar_Docentes($MiConexion);
$CantidadDocentes=count($ListadoDocentes);
require_once 'funciones/cuenta_doc.php'; 
$ListadoCuenta=Listar_Cuenta($MiConexion);
$CantidadCuenta=count($ListadoCuenta);

require_once 'funciones/select_alumnos.php'; 
$ListadoAlumnos=Listar_Alumnos($MiConexion);
$CantidadAlumnos=count($ListadoAlumnos);
require_once 'funciones/select_cursos.php'; 
$ListadoCursos=Listar_Cursos($MiConexion);
$CantidadCursos=count($ListadoCursos);
require_once 'funciones/select_usuarios.php'; 
$ListadoUsuarios=Listar_Usuarios($MiConexion);
$CantidadUsuarios=count($ListadoUsuarios);
 require_once 'header.inc.php'; ?>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
            <?php require_once 'menu.inc.php'; ?>
                     <?php require_once 'user.inc.php'; ?>
  </header>
    <!-- Sidebar menu-->
   <?php require_once 'slider.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
        </ul>
      </div>
 <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/4e183051667bcc0d2d93fcbe250ac3-unscreen.gif"/>
            <div class="info">
              <h4>Docentes</h4>
              <p><b><?php echo $CantidadCuenta; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
       <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/c3fffbed1207d91467708b02a2713cfc.gif"/>
            <div class="info">
              <h4>Alumnos</h4>
              <p><b><?php echo $CantidadAlumnos; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/ezgif.com-gif-maker-8.gif"/>
            <div class="info">
              <h4>Cursos</h4>
              <p><b><?php echo $CantidadCursos; ?></b></p>
            </div>
        </div>
      </div>
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/hard-working-on-computer-anim--unscreen.gif"/>
            <div class="info">
              <h4>Usuarios</h4>
              <p><b><?php echo $CantidadUsuarios; ?></b></p>
            </div>
        </div>
       </div>
      </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
   </body>
</html>