<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_cursoscompletos2.php';
$ListadoCursosCompletos=Listar_Cursos($MiConexion);
$CantidadCursosCompletos=count($ListadoCursosCompletos);

require_once 'funciones/validar_asistenciaalum.php'; 
require_once 'funciones/insertar_asistenciaalum2.php'; 
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
$Mensaje= Validar_Asistencia();
if(empty($Mensaje)){
  if(InsertarAsistencia($MiConexion)!= false) {
    $Mensaje= 'Asistencia cargada!';
    $_POST= array();
   $Estilo='success';
}
 }
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
     <?php require_once 'slideralumnos.inc.php'; ?>
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
          <li class="breadcrumb-item"><a href="#">Registro asistencia</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa datos de asistencia<img  src= "icon/student-answer-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 15%" /></h3>
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
             <form class="user" method="post">
               <!-- RENGLON UNO  APELLIDO  Y NOMBRE-->
               <div class="form-group row">
 <div class="col-sm-6">
<label class="control-label">Curso </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Curso" class="form-control form-control-user" id="curso" onchange="getStudents()">
      <option value="">Selecciona...</option>
      <?php
      for ($i = 0; $i < $CantidadCursosCompletos; $i++) {
        if (!empty($_POST['Curso']) && $_POST['Curso'] == $ListadoCursosCompletos[$i]['ID']) {
          $selected = 'selected';
        } else {
          $selected = '';
        }
        ?>
        <option value="<?php echo $ListadoCursosCompletos[$i]['ID']; ?>" <?php echo $selected; ?>><?php echo $ListadoCursosCompletos[$i]['CURSO'], $ListadoCursosCompletos[$i]['DIVISION']; ?><?php echo $ListadoCursosCompletos[$i]['TURNO']; ?></option>
      <?php } ?>
    </select>
                    </div>
                    </div>



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
                     <th>Cambio Actividad</th>
                    <th>Embarazo</th>
                     <th>Deportiva</th>
                    
                  </tr>
                </thead>


                <tbody id="studentsTableBody">
             
                  </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>

            
         
                   <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="asistenciaalum2.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
<script>
function getStudents() {
    var selectedCourse = document.getElementById('curso').value;
    $.ajax({
      type: 'POST',
      url: 'get_students.php', // Replace with the actual URL to fetch students
      data: { CursoId: selectedCourse }, // Corrected to pass as an object
      dataType: 'html', // Specify the expected response type
      success: function (data) {
        $('#studentsTableBody').html(data);
      },
      error: function () {
        console.log('Error fetching students');
      }
    });
  }
</script>

    <!-- Page specific javascripts-->
     </body>
</html>