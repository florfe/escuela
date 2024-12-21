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
require_once 'funciones/select_usuarios.php'; 
$ListadoUsuarios=Listar_Usuarios($MiConexion);
$CantidadUsuarios=count($ListadoUsuarios);
require_once 'funciones/listar_materias10.php'; 
$ListadoMaterias1=Listar_materias1($MiConexion);
$CantidadMaterias1=count($ListadoMaterias1);
require_once 'funciones/listar_materias20.php'; 
$ListadoMaterias2=Listar_materias2($MiConexion);
$CantidadMaterias2=count($ListadoMaterias2);
require_once 'funciones/listar_materias30.php'; 
$ListadoMaterias3=Listar_materias3($MiConexion);
$CantidadMaterias3=count($ListadoMaterias3);
require_once 'funciones/listar_materias40hum.php'; 
$ListadoMaterias4hum=Listar_materias4hum($MiConexion);
$CantidadMaterias4hum=count($ListadoMaterias4hum);
require_once 'funciones/listar_materiaseco40.php'; 
$ListadoMaterias4eco=Listar_materias4eco($MiConexion);
$CantidadMaterias4eco=count($ListadoMaterias4eco);

require_once 'funciones/listar_materias50hum.php'; 
$ListadoMaterias5hum=Listar_materias5hum($MiConexion);
$CantidadMaterias5hum=count($ListadoMaterias4hum);
require_once 'funciones/listar_materias50eco.php'; 
$ListadoMaterias5eco=Listar_materias5eco($MiConexion);
$CantidadMaterias5eco=count($ListadoMaterias5eco);

require_once 'funciones/listar_materias60hum.php'; 
$ListadoMaterias6hum=Listar_materias6hum($MiConexion);
$CantidadMaterias6hum=count($ListadoMaterias6hum);
require_once 'funciones/listar_materias60eco.php'; 
$ListadoMaterias6eco=Listar_materias6eco($MiConexion);
$CantidadMaterias6eco=count($ListadoMaterias6eco);
 require_once 'header.inc.php'; ?>

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->

            <?php require_once 'menu.inc.php'; ?>
         
            <?php require_once 'user.inc.php'; ?>

    </header>
    <!-- Sidebar menu-->
   <?php require_once 'slidermaterias.php'; ?>
    <!-- fin Sidebar menu-->

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="principalmaterias.php">Inicio</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_1_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 1° año</h4>
              <p><b><?php echo $CantidadMaterias1; ?></b></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_2_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 2° año</h4>
            <p><b><?php echo $CantidadMaterias2; ?></b></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_3_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 3° año</h4>
             <p><b><?php echo $CantidadMaterias3; ?></b></p>
            </div>
        </div>
              </div>
</div>
              <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_4_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 4° Humanidades</h4>
            <p><b><?php echo $CantidadMaterias4hum; ?></b></p>
            </div>
        </div>
        
      </div>

     <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_4_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 4° Economia</h4>
             <p><b><?php echo $CantidadMaterias4eco; ?></b></p>
            </div>
        </div>
        
      </div>
      </div>
              <div class="row">
      <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_5_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 5° Humanidades</h4>
             <p><b><?php echo $CantidadMaterias5hum; ?></b></p>
            </div>
        </div>
        
      </div>
      <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_5_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 5° Economia</h4>
            <p><b><?php echo $CantidadMaterias5eco; ?></b></p>
            </div>
        </div>
        
      </div>
      </div>
              <div class="row">
      <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_6_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 6° Humanidades</h4>
            <p><b><?php echo $CantidadMaterias6hum; ?></b></p>
            </div>
        </div>
        
      </div>
      <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/bouncing_6_md_nwm_v2.gif"/>
            <div class="info">
              <h4>Materias 6° Economia</h4>
              <p><b><?php echo $CantidadMaterias6eco; ?></b></p>
            </div>
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