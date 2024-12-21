<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

require_once 'funciones/validar_docente.php'; 
require_once 'funciones/insertar_asistenciadoc.php'; 

$Mensaje= '';
$Estilo= 'danger';

if(!empty($_POST['BotonRegistrar'])) {
$fecha = $_POST['Fecha'];
$currentDate = date('Y-m-d');
if ($fecha > $currentDate) {
$Mensaje = 'No se permite la carga para fechas futuras.';
$Estilo = 'danger';
 } else {
$dayOfWeek = date('N', strtotime($fecha));
  $fecha = $_POST['Fecha'];
$dayOfWeek = date('N', strtotime($fecha));
if ($dayOfWeek == 6 || $dayOfWeek == 7) {    

 $Mensaje='No se permite la carga para los días sábados o domingos.';
  
$Estilo = 'danger';
  } else {
    $fecha = $_POST['Fecha'];
    $consultaFechaExistente = "SELECT COUNT(*) AS existe FROM asistenciadoc WHERE Fecha = '$fecha'";
        $resultadoFechaExistente = mysqli_query($MiConexion, $consultaFechaExistente);
        $filaFechaExistente = mysqli_fetch_assoc($resultadoFechaExistente);

        if ($filaFechaExistente['existe'] > 0) {
 $Mensaje = 'La fecha seleccionada ya está registrada en la base de datos.';
        $Estilo = 'danger';
    } else {


$Mensaje= Validar_Docente();
if(empty($Mensaje)){

     
if(InsertarAsistencia($MiConexion)!= false ) {
    $Mensaje= 'Asistencia cargada!';
    $_POST= array();
   $Estilo='success';
}
 }
}
}}
}
$docentes="SELECT Id, Nombre, Apellido FROM docentes order by Apellido";
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
          <h1><i class="fa fa-edit"></i> Registrar Asistencia</h1>
          <p>Completa todos los datos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa datos de asistencia<img  src= "icon/business-woman-run-inside-cloc-unscreen.gif" style="width:15%; position: absolute; right:8%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable"style="width: 49%">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
                            
              </div>
                <div class="bs-component">
                <div class="alert alert-dismissible alert-info"style="width: 49%">
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post" >
               <!-- RENGLON UNO  APELLIDO  Y NOMBRE-->

<div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Fecha </label> 
<input type="date" id="fecha" class="form-control form-control-user" name="Fecha" > </div></div>


                   

                    <HR></HR>

 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Cargar inasistencias</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>

                    <!--<th>#</th>-->
                    <th>Apellido y Nombre</th>
                    <th>Presente</th>
                    <th>Falta Justificada</th>
                    <th>Falta Injustificada</th>
                    <th>Carpeta Medica</th>
                     <th>Licencia</th>
                     <th>Cambio Actividad</th>
                  </tr>
                </thead>
                <tbody>
              <?php 



              $grupo = 1; 

              $lista=mysqli_query($MiConexion, $docentes); 
              while ($fila = mysqli_fetch_array($lista)) { 
            

                ?> 
                <tr > 
                  <!--<td><?php echo $fila['Id']; ?></td> -->
                  <td><?php echo $fila['Apellido'], $fila['Nombre'];?></td> 
                  <td><input type='radio' value='Presente' id="Presente" name= 'Falta<?php echo $grupo.'[]'; ?>' checked></td> 
                  <td><input type='radio' value='Justificada' id="Justificada"name='Falta<?php echo $grupo.'[]'; ?>' > </td> 
                  <td><input type='radio' value='Injustificada' id="Injustificada" name='Falta<?php echo $grupo.'[]'; ?>'> </td> 
                  <td><input type='radio' value='Carpeta' id="Carpeta" name='Falta<?php echo $grupo.'[]'; ?>'> </td> 
                  <td><input type='radio' value='Licencia' id="Licencia" name='Falta<?php echo $grupo.'[]'; ?>'> </td><td><input type='radio' value='Actividad' id="Actividad" name='Falta<?php echo $grupo.'[]'; ?>'> </td> 
                </tr> <?php $grupo++;



              } 
              

              ?>

            
                  </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>

            
         
                   <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="asistenciadoc.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </div>
            </form>
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