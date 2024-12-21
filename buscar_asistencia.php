<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();


$SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, estad.IdDocente, estad.Fecha, estad.EstadoAsis as Asistencia
        FROM docentes doc, asistenciadoc estad  where doc.Id=estad.IdDocente order by estad.Fecha
             ";









require_once 'header.inc.php'; 

?>

  </head>
  <?php
  $search_inasistencias='';
if(empty(($_REQUEST['inasistencias'])){
  header("location: listadoasistencia.php");
}
if(!empty(($_REQUEST['inasistencias'])){
  $search_inasistencias=$_REQUEST['inasistencias'];
}
?>
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
                   <p>Listado total de asistencia docente</p>
           </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de asistencia docente</a></li>
          </ul>
      </div>
      <div class="row">
               <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Asistencia de Docentes</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <!--<th>#</th>-->
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    
                    <th>
<?php 
$pro=0;
if(!empty($_REQUEST['inasistencias'])){
  $pro=$_REQUEST['inasistencias'];
}
$query_inasistencias=mysqli_query($MiConexion,"SELECT * FROM inasistencias");
$result_inasistencias=mysqli_num_rows($query_inasistencias);
?>
                      <select name="inasistencias" class="form-control form-control-user" id="search_inasistencias" style="width: 40%;">
                        <?php 
if($result_inasistencias > 0)
{
  while($inasistencias=mysqli_fetch_array($query_inasistencias)){
    if($pro==$inasistencias["Denominacion"]){

                       ?>
      <option value="<?php echo $inasistencias["Id"]; ?>" selected> <?php echo $inasistencias["Denominacion"] ?> </option>
      <?php 
}else{

?>
  <option value="<?php echo $inasistencias["Id"]; ?>" > <?php echo $inasistencias["Denominacion"] ?> </option>
<?php
}
}}

      ?>

      </select> 

                        </th>
                    <th></th>
                  </tr>
                </thead>
                              <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                                  { ?>
                  <tr > 
                  <!--<td><?php echo $row['ID']; ?></td>-->
                   <td><?php echo $row['Nombre']; ?></td>
                   <td><?php echo $row['Apellido']; ?></td>
                                 
                                 <td><?php echo $row['Fecha']; ?></td>
                 <td><?php echo $row['Asistencia']; ?></td>
              <td><a href="actualizarasis.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                  </tr>
                 <?php } ?>
                    <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total de registros: <?php echo ($row_cnt);?></h4>
                                  </tbody>
              </table>
            </div><img  src= "icon/business-line-PA-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
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
      <script src="js/functions.js"></script>




    <!-- Page specific javascripts-->
      </body>
</html>