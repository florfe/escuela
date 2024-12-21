<?php
  session_start();

if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
 require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

require_once 'funciones/listar_coloquiosfebrero.php'; 
$ListadoColoquiosFebrero=Listar_ColoquiosFebrero($MiConexion);
$CantidadColoquiosFebrero=count($ListadoColoquiosFebrero);
require_once 'funciones/listar_coloquiosdiciembre.php'; 
$ListadoColoquiosDiciembre=Listar_ColoquiosDiciembre($MiConexion);
$CantidadColoquiosDiciembre=count($ListadoColoquiosDiciembre);


require_once 'funciones/listar_previasdiciembre.php'; 
$ListadoPreviasDiciembre=Listar_PreviasDiciembre($MiConexion);
$CantidadPreviasDiciembre=count($ListadoPreviasDiciembre);
require_once 'funciones/listar_previasabril.php'; 
$ListadoPreviasAbril=Listar_PreviasAbril($MiConexion);
$CantidadPreviasAbril=count($ListadoPreviasAbril);

require_once 'funciones/listar_previasjulio.php'; 
$ListadoPreviasJulio=Listar_PreviasJulio($MiConexion);
$CantidadPreviasJulio=count($ListadoPreviasJulio);
require_once 'funciones/listar_previasfebrero.php'; 
$ListadoPreviasFebrero=Listar_PreviasFebrero($MiConexion);
$CantidadPreviasFebrero=count($ListadoPreviasFebrero);
require_once 'funciones/listar_previasseptiembre.php'; 
$ListadoPreviasSeptiembre=Listar_PreviasSeptiembre($MiConexion);
$CantidadPreviasSeptiembre=count($ListadoPreviasSeptiembre);
 require_once 'header.inc.php'; ?>


  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->

            <?php require_once 'menu.inc.php'; ?>
         
            <?php require_once 'user.inc.php'; ?>

    </header>
    <!-- Sidebar menu-->
   <?php require_once 'sliderexamen.php'; ?>
    <!-- fin Sidebar menu-->

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="principalexamen.php">Inicio</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/stick-figure-tightrope-md-nwm--unscreen.gif"/>
            <div class="info">
              <h4>Coloquios</h4>
              <h4>Febrero</h4>
                <p><b><?php echo $CantidadColoquiosFebrero; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/brainstorm-conference-PA-md-nw-unscreen.gif"/>
            <div class="info">
              <h4>Coloquios</h4>
              <h4>Diciembre</h4>
               <p><b><?php echo $CantidadColoquiosDiciembre; ?></b></p>
            </div>
          </div>
        </div>
     
        <div class="col-md-3">
           
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/stick-figure-running-with-lugg-unscreen.gif"/>
            <div class="info">
              <h4>Previas</h4><h4> Febrero</h4>
              <p><b><?php echo $CantidadPreviasFebrero; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
           
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/stick-figure-log-rolling-md-nw-unscreen.gif"/>
            <div class="info">
              <h4>Previas</h4><h4> Abril</h4>
              <p><b><?php echo $CantidadPreviasAbril; ?></b></p>
            </div>
          </div>
        </div>
  
        <div class="col-md-3">
           
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/walking-with-shopping-bags-PA--unscreen.gif"/>
            <div class="info">
              <h4>Previas</h4><h4> Julio</h4>
              <p><b><?php echo $CantidadPreviasJulio; ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/stick-figure-red-tape-md-nwm-v-unscreen.gif"/>
            <div class="info">
              <h4>Previas</h4><h4> Septiembre</h4>
            <p><b><?php echo $CantidadPreviasSeptiembre; ?></b></p>
            </div>
        </div>
        </div>
             
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><img class="icon fa fa-users fa-3x" src= "icon/elf-run-present-md-nwm-v2-unscreen.gif"/>
            <div class="info">
              <h4>Previas</h4><h4> Diciembre</h4>
              <p><b><?php echo $CantidadPreviasDiciembre; ?></b></p>
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