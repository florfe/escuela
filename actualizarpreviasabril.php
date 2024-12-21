<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$variable=$_GET['id'];
$coloquios = "SELECT Id, Curso, Materia, Fecha, Hora
        FROM previasabril
       where  Id='$variable'
        ";
require_once 'funciones/actualizarpreviasabril.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(ActualizarColoquios($MiConexion)!= false) {
    $Mensaje= 'Coloquio actualizado!';
    $_POST= array();
   $Estilo='success';
  }}}
require_once 'header.inc.php'; 
?>
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
          <h1><i class="fa fa-th-list"></i> Listados<img  src= "icon/5B2J-unscreen.gif" style="width:6%; position: absolute; right:20%" /></h1>
                   <p>Listado total de Previas</p>
           </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de Previas</a></li>
          </ul>
      </div>
       <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                    <?php echo $Mensaje; ?> 
                                </div>
                            <?php } ?>
              </div>
      <form action="" method="post">
      <div class="row">
                <div class="col-md-12">
          <div class="tile">
                        <div class="table-responsive">
              <table class="table">
                               <thead>
                <tr style='background-color:#36A0D6; color:#ffff'>
               
                     <th>Curso</th>
                    
                    <th>Materia</th>
                     <th>Fecha</th>
                    <th>Hora</th>
                  </tr>
                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $coloquios); 
                while($row=mysqli_fetch_assoc($resultado))
                { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                <td> <input type="text" style="border:0" name="curso" value="<?php echo $row['Curso']; ?>"></td>
                
                <td> <input type="text" style="border:0"  name="materia" value="<?php echo $row['Materia']; ?>"></td>
                <td> <input type="text" style="border:0" name="fecha" value="<?php echo $row['Fecha']; ?>"></td>
                <td> <input type="text" style="border:0" name="hora" value="<?php echo $row['Hora']; ?>"></td>
                </tr>
                                
                                  <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                  <td>  <a class="btn btn-secondary" href="listadoprevabril.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a></td>
                  </tr>

    
            
                </thead>
                <?php } ?>
                </tbody>

              </table>
             
            </div>
          </div>
        </div></form>
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