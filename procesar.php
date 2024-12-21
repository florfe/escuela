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

require_once 'header.inc.php'; 
?>

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
          <h1><i class="fa fa-th-list"></i> Listados</h1>
         
          <p>Listado total de docentes</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de docentes</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dni</th>
                    <th>Cuil</th>
                    <th>FechaNacimiento</th>
                    <th>Edad</th>
                    <th>Telefono</th>

                  </tr>
                </thead>
               
                <tbody>
                 <?php  
                 for ($i=0; $i<$CantidadDocentes; $i++) { ?>
                  <tr > 
                  <td><?php echo $ListadoDocentes[$i]['Id']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['Nombre']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['Apellido']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['NumeroDni']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['Cuil']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['FechaNacimiento']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['Edad']; ?></td>
                  <td><?php echo $ListadoDocentes[$i]['NumeroTel']; ?></td>
                  <td><a href="actualizar2.php?id=<?php echo $ListadoDocentes[$i]['Id']; ?>">Guardar datos...</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
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