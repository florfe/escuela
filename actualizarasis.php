<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$variable=$_GET['id'];
$docentes="SELECT doc.Id as ID, doc.Apellido, doc.Nombre, estad.IdDocente, estad.Fecha, estad.EstadoAsis as Asistencia
        FROM docentes doc, asistenciadoc estad  
        WHERE doc.Id='$variable' 
        order by estad.Fecha";
require_once 'funciones/actualizarasis.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {


if(empty($Mensaje)){
  if(ActualizarDocentes($MiConexion)!= false) {
    $Mensaje= 'Asistencia actualizada!';
    $_POST= array();
   $Estilo='success';
 }
 }
}

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
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha</th>
                <th>Asistencia</th>
                

                               </tr>
                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $docentes); 
                while($row=mysqli_fetch_assoc($resultado))
                { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['ID']; ?>">
                <td> <input type="text" style="border:0" name="nombre" value="<?php echo $row['Nombre']; ?>"></td>
                <td> <input type="text" style="border:0" name="apellido" value="<?php echo $row['Apellido']; ?>"></td>
                <td><input type="text" style="border:0" name="fecha" value="<?php echo $row['Fecha']; ?>"></td>
                <td> <input type="text" style="border:0"  name="asistencia" value="<?php echo $row['Asistencia']; ?>"></td>
              
                                </tr>
                                
                   
                                  <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                    <td>  <a class="btn btn-secondary" href="listadoasistencia.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a></td>
                  </tr>
                </thead>
                <?php } ?>
                </tbody>
              </table>
            </div><img  src= "icon/businessman-run-inside-clock-m-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
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