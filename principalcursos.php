<?php
  session_start();

if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
 require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
 require_once 'funciones/select_divisiones.php'; 
$ListadoDivisiones=Listar_Divisiones($MiConexion);
$CantidadDivisiones=count($ListadoDivisiones);
require_once 'funciones/listar_todoscurso.php'; 
$ListadoCursosCompletos=Listar_CursosCompletos($MiConexion);
$CantidadCursosCompletos=count($ListadoCursosCompletos);
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
   <?php require_once 'slidercursos.inc.php'; ?>
    <!-- fin Sidebar menu-->

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="principalcursos.php">Inicio</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/dbc76a0d33d49ea4b8185b27b03487-unscreen.gif"/>
            <div class="info">
              <h4>Cursos</h4>
              <p><b><?php echo $CantidadCursosCompletos; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
           
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/divis3-unscreen.gif"/>
            <div class="info">
              <h4>Divisiones</h4>
              <p><b><?php echo $CantidadDivisiones; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/b4276d041f55a4343eac04e4308b32e4.gif"/>
            <div class="info">
              <h4>Orientaciones</h4>
              <p><b>2</b></p>
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