<?php
  session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_alumnos.php'; 
$ListadoAlumnos=Listar_Alumnos($MiConexion);
$CantidadAlumnos=count($ListadoAlumnos);
require_once 'funciones/validacion_constanciaalumnoreg.php'; 

$Mensaje='';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])){
  $Mensaje= Validar_Datos();
 require_once 'funciones/dnialum_loguin.php'; 
  $AlumnoLogueado=DatosDniLoguin($_POST['NumeroDni'], $MiConexion);
  if(!empty($AlumnoLogueado)){
    $_SESSION['Alumno_Nombre']=$AlumnoLogueado['NOMBRE'];
     $_SESSION['Alumno_Apellido']=$AlumnoLogueado['APELLIDO'];
      $_SESSION['Alumno_NumeroDni']=$AlumnoLogueado['NUMERODNI'];
         $_SESSION['Alumno_IdCurso'] = $AlumnoLogueado['IDCURSO'];
                $_SESSION['Alumno_IdDivision'] = $AlumnoLogueado['IDDIVISION'];
             $_SESSION['Alumno_IdTurno'] = $AlumnoLogueado['IDTURNO'];
           $_SESSION['Alumno_IdCiclo'] = $AlumnoLogueado['IDCICLO'];
      header('location:Reportesalumnos-pdf-php/index.php');
      exit;
    }
    else
      {
        $Mensaje='Dni incorrecto! Intenta nuevamente';
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
          <h1><i class="fa fa-edit"></i> Certificados</h1>
          <p>Certificado Alumnos Regular</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Certificado Alumno Regular</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Selecciona el Alumno<img  src= "icon/stick-figure-slam-dance-md-nwm-unscreen.gif" style="width:20%; position: absolute; right: 10%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
              </div>

                <div class="bs-component">
               
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post" target="_blank">

              <!-- RENGLON DOS  TIPO Y  NUMERO  DNI-->
             <div class="form-group row">
 <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Alumno </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Alumnos" class="form-control form-control-user" id="alumnos" onchange="updateDNI()">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadAlumnos;$i++) {
if(!empty($_POST['Alumnos'])&& $_POST['Alumnos']==  $ListadoAlumnos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoAlumnos[$i]['ID'];  ?>" data-dni="<?php echo $ListadoAlumnos[$i]['NUMERODNI']; ?>"<?php echo $selected; ?> ><?php echo $ListadoAlumnos[$i]['APELLIDO'], $ListadoAlumnos[$i]['NOMBRE'];  ?></option>
<?php } ?>
</select> 
                    </div>

</div>
  <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Numero DNI </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<input type="text" class="form-control form-control-user" name="NumeroDni" id="NumeroDni" pattern="[0-9]{8}" minlength="8" maxlength="8"placeholder="Numero DNI sin puntos"
required>
</div></div>
   <div class="tile-footer">
<button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="constanciaalumnoregular.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
   function updateDNI() {
      var selectedAlumno = document.getElementById("alumnos");
      var dniInput = document.getElementById("NumeroDni");

      // Obtener el DNI del atributo data-dni del elemento seleccionado
      var selectedDNI = selectedAlumno.options[selectedAlumno.selectedIndex].getAttribute("data-dni");

      // Asignar el DNI al campo de entrada
      dniInput.value = selectedDNI;
   }
</script>
    <!-- Page specific javascripts-->
     </body>
</html>