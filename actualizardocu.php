<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$variable=$_GET['id'];
$docentes="SELECT  doc.Id, doc.Nombre, doc.Apellido, entre.IdDocente, entre.CopiaDni as Dni, entre.ConstanciaServ as Constancia, entre.RegimenIncomp as Regimen, entre.CertifDelitSex as Delitos, entre.TituloDoc as Titulo, entre.AptoPsicofis as Apto, entre.ArtCarnet as ART, entre.CopiaVac as Vacunas
        FROM docentes doc, entrega entre
        Where doc.Id=entre.IdDocente AND doc.Id='$variable'";
require_once 'funciones/actualizardocu.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(ActualizarDocentes($MiConexion)!= false) {
    $Mensaje= 'Documentacion actualizada!';
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
                <th>Dni</th>
                <th>Constancia</th>
                <th>Regimen</th>
                                </tr>
                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $docentes); 
                while($row=mysqli_fetch_assoc($resultado))
                { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                <td> <input type="text" style="border:0" name="nombre" value="<?php echo $row['Nombre']; ?>"></td>
                <td> <input type="text" style="border:0" name="apellido" value="<?php echo $row['Apellido']; ?>"></td>
                <td><input type="text" style="border:0; width: 200px" name="dni" value="<?php echo $row['Dni']; ?>"></td>
                <td> <input type="text" style="border:0; width: 200px"  name="constancia" value="<?php echo $row['Constancia']; ?>"></td>
                <td> <input type="text" style="border:0; width: 200px" name="regimen" value="<?php echo $row['Regimen']; ?>"></td>
                                </tr>
                                 <tr style='background-color:#36A0D6; color:#ffff'>
                    <th>Delitos</th>
                <th>Titulo</th>
                <th>Apto</th>
                <th>ART</th>
                <th>Vacunas</th>
                    </tr>
                    <tr> 
                       <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                       <td> <input type="text" style="border:0; width: 200px" name="delitos" value="<?php echo $row['Delitos']; ?>"></td>
                    <td> <input type="text" style="border:0; width: 200px" name="titulo" value="<?php echo $row['Titulo']; ?>"></td>
                    <td> <input type="text" style="border:0; width: 200px" name="apto" value="<?php echo $row['Apto']; ?>"></td>
                    <td> <input type="text" style="border:0; width: 200px" name="art" value="<?php echo $row['ART']; ?>"></td>
                    <td><input type="text" style="border:0; width: 200px" name="vacunas" value="<?php echo $row['Vacunas']; ?>"></td>
                                       </tr>
                                                    <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                    <td>  <a class="btn btn-secondary" href="listadodocumen.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a></td>
                  </tr>
                </thead>
                <?php } ?>
                </tbody>
              </table>
            </div><img  src= "icon/business-people-greet-md-nwm-v-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
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
      
      