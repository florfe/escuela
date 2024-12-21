'<?php
  session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_alumnos.php'; 
$ListadoDocentes=Listar_Alumnos($MiConexion);
$CantidadDocentes=count($ListadoDocentes);
require_once 'funciones/validacion_libreton.php'; 

$Mensaje='';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])){
  $Mensaje= Validar_Datos();
 require_once 'funciones/dni_loguinpermiso.php'; 
  $AlumnoLogueado=DatosDniLoguinpermiso($_POST['NumeroDni'],  $MiConexion);
  if(!empty($AlumnoLogueado)){
            $_SESSION['Alumno_Nombre'] = $AlumnoLogueado['NOMBRE'];
            $_SESSION['Alumno_Apellido'] = $AlumnoLogueado['APELLIDO'];
            $_SESSION['Alumno_NumeroDni'] = $AlumnoLogueado['NUMERODNI'];
          $_SESSION['Alumno_Id'] = $AlumnoLogueado['ID'];
     header('location:ReportesPermiso-pdf-php/index.php');
      exit;
    }
    else
      {
        $Mensaje='Datos incorrectos! Intenta nuevamente';
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
     <?php require_once 'sliderexamen.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Certificados</h1>
          <p>Permiso de examen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Permiso de examen</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Permiso de examen<img  src= "icon/trying-on-glasses-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 8%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable"style="width:49%">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
              </div>

                <div class="bs-component"style="width:49%">
               
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post" target="_blank">

              <!-- RENGLON DOS  TIPO Y  NUMERO  DNI-->
       <div class="form-group row">
               <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Alumno </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Docentes" class="form-control form-control-user" id="docentes" onchange="updateDNI()">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadDocentes;$i++) {
if(!empty($_POST['Docentes'])&& $_POST['Docentes']==  $ListadoDocentes[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoDocentes[$i]['ID'];  ?>" data-dni="<?php echo $ListadoDocentes[$i]['NUMERODNI']; ?>" <?php echo $selected; ?> ><?php echo $ListadoDocentes[$i]['APELLIDO'], $ListadoDocentes[$i]['NOMBRE'];  ?></option>
<?php } ?>
</select> 
 </div></div>
<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Numero DNI </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
 <input type="text" class="form-control form-control-user" name="NumeroDni" id="NumeroDni" pattern="[0-9]{8}" minlength="8" maxlength="8"placeholder="Numero DNI sin puntos"
required>
</div></div>


   <div class="tile-footer">

    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="permiso.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
     <script>
   function updateDNI() {
      var selectedTeacher = document.getElementById("docentes");
      var dniInput = document.getElementById("NumeroDni");

      var selectedDNI = selectedTeacher.options[selectedTeacher.selectedIndex].getAttribute("data-dni");

      
      dniInput.value = selectedDNI;
   }
</script>
     </body>
</html>