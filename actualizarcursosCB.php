<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$variable=$_GET['id'];
$docentes="SELECT doc.Id, doc.Apellido, doc.Nombre, mat.Docente, mat.IdCurso as Curso, mat.IdTurno as Turno, mat.IdDivision as Division, mat.Nombre as Materia
        FROM docentes doc, materias mat
        WHERE doc.Id = mat.Docente  and doc.Id = '$variable'
        ORDER BY mat.IdCurso, mat.IdDivision, mat.IdTurno ";

require_once 'funciones/actualizarcursosCB.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {

 $id = $_POST['id'];
    $curso = $_POST['curso'];
    $divi = $_POST['division'];
    $tur = $_POST['turno'];
    $materia = $_POST['materia'];
    
    // Check if the combination already exists
    $checkSQL = "SELECT COUNT(*) AS count FROM materias WHERE  IdCurso = '$curso' AND IdDivision = '$divi' AND IdTurno = '$tur'";
    $result = mysqli_query($MiConexion, $checkSQL);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['count'] > 0) {
        if (mysqli_num_rows($result) > 0) {
        $Mensaje = 'La combinación de curso, división y turno ya existe para un docente.';
        $Estilo = 'danger';
    } else {
  if(empty($Mensaje)){
  if(ActualizarDocentes($MiConexion)!= false) {
    $Mensaje= 'Docente actualizado!';
    $_POST= array();
   $Estilo='success';
  }}}}}
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
          <h1><i class="fa fa-th-list"></i> Listados<img  src= "icon/5B2J-unscreen.gif" style="width:6%; position: absolute; right:20%" /></h1>
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
                <th>Apellido</th>
                <th>Nombre</th>
               
                <th>Curso</th>
                <th>Division</th>
                <th>Turno</th>
                <th>Materia</th>
                </tr>
                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $docentes); 
                while($row=mysqli_fetch_assoc($resultado))
                { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
               <td> <input type="text" style="border:0" name="apellido" value="<?php echo $row['Apellido']; ?>"></td>
                <td> <input type="text" style="border:0" name="nombre" value="<?php echo $row['Nombre']; ?>"></td>
                
                <td><input type="text" style="border:0" name="curso" value="<?php echo $row['Curso']; ?>"></td>
                <td> <input type="text" style="border:0"  name="division" value="<?php echo $row['Division']; ?>"></td>
                <td> <input type="text" style="border:0" name="turno" value="<?php echo $row['Turno']; ?>"></td>
                <td> <input type="text" style="border:0; width: 180px" name="materia" value="<?php echo $row['Materia']; ?>"></td>
                </tr>
                                
                                  <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                  <td>  <a class="btn btn-secondary" href="listadocursos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a></td>
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