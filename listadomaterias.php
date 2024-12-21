<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$SQL = "SELECT DISTINCT  mat.Nombre as Ciclo_Basico
        FROM materias mat
      
        ";
$SQL2 = "SELECT DISTINCT  ori.Nombre as Ciclo_Orientado 
        FROM  materiasorientado ori
      
        ";
require_once 'header.inc.php'; 
?>

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
          <h1><i class="fa fa-th-list"></i> Listados</h1>
         
          <p>Listado total de materias</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de materias</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Materias</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                   
                     <th>Ciclo_Basico</th>
                    <th>Ciclo_Orientado</th>
                   
                     
                  </tr>
                </thead>
               
                <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                
                  { ?>
                  <tr > 
                  
                  <td><?php echo $row['Ciclo_Basico']; ?></td>
                   <?php } ?> 
                  
                   <?php
                   $resultado2=mysqli_query($MiConexion, $SQL2); 
                 while($row=mysqli_fetch_assoc($resultado2))
                
                  { ?>
                   <td><?php echo $row['Ciclo_Orientado']; ?></td>
                 
               
               
                  </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div><img  src= "icon/businessmen-greet-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
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