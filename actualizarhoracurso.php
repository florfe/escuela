<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$variable=$_GET['id'];
$alumnos = "SELECT comp.Id  as ID, doc.Curso, doc.Ciclos, doc.Turno, doc.Division, comp.IdCurso, comp.Dia as Dia, comp.Hora, comp.Horario_ingreso as Ingreso, comp.Horario_salida as Salida, comp.Materia
FROM cursoscompletos doc,  hora as comp
WHERE comp.IdCurso=doc.Id
      
       

       AND comp.Id='$variable'";



require_once 'funciones/actualizarhoracurso.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(ActualizarAlumnos($MiConexion)!= false) {
    $Mensaje= 'Datos actualizados!';
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
  <?php require_once 'slidercursos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Actualizar</h1>
         
          <p>Actualizar Horarios  y Materias</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Actualizar Alumnos</a></li>
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
                <th>Division</th>
                <th>Turno</th>
                <th>Ciclo</th>
                 <th>Materias</th>
                <th>Hora</th>
                <th>Dia</th>
                <th>Ingreso</th>
                <th>Salida</th>
                </tr>

                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $alumnos); 
               
                while($row=mysqli_fetch_assoc($resultado))
                   { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['ID']; ?>">
              
                <td><input type="text" style="border:0" name="curso" value="<?php echo $row['Curso']; ?>"></td>
                <td><input type="text" style="border:0" name="division" value="<?php echo $row['Division']; ?>"></td>
                <td><input type="text" style="border:0" name="turno" value="<?php echo $row['Turno']; ?>"></td>
                <td> <input type="text" style="border:0"  name="ciclo" value="<?php echo $row['Ciclos']; ?>"></td>
                <td> <input type="text" style="border:0" name="materias" value="<?php echo $row['Materia']; ?>"></td>
               <td> <input type="text" style="border:0" name="hora" value="<?php echo $row['Hora']; ?>"></td>
                <td> <input type="text" style="border:0" name="dia" value="<?php echo $row['Dia']; ?>"></td>
                <td> <input type="text" style="border:0" name="ingreso" value="<?php echo $row['Ingreso']; ?>"></td>
                <td> <input type="text" style="border:0" name="salida" value="<?php echo $row['Salida']; ?>"></td>

                </tr>
             
                    
                                <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                  </tr>

                </thead>
                <?php } ?>
                </tbody>
              </table>
            </div><img  src= "icon/71f1bb4cb2e5cce9c2c39de4ee4bd7-unscreen.gif" style="width:15%; position: absolute; right:8%" />
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