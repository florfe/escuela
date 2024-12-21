<?php
  session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_materias.php'; 
$ListadoNombre=Listar_Listamaterias($MiConexion);
$CantidadNombre=count($ListadoNombre);
require_once 'funciones/listar_materiasorientado.php'; 
$ListadoNombreor=Listar_Listamateriasori($MiConexion);
$CantidadNombreor=count($ListadoNombreor);
require_once 'funciones/listar_cursostodos.php'; 
$ListadoCurso=Listar_Curso($MiConexion);
$CantidadCurso=count($ListadoCurso);
require_once 'funciones/listar_turno.php'; 
$ListadoTurno=Listar_Turno($MiConexion);
$CantidadTurno=count($ListadoTurno);
require_once 'funciones/listar_division.php'; 
$ListadoDivision=Listar_Division($MiConexion);
$CantidadDivision=count($ListadoDivision);
require_once 'funciones/validacion_libreton.php'; 
$Mensaje='';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])){
  $Mensaje= Validar_Datos();
 require_once 'funciones/dni_loguinacta.php'; 
  $AlumnoLogueado=DatosDniLoguinacta($_POST['Materias'], $_POST['Curso'], $_POST['Division'], $_POST['Turno'], $MiConexion);
  
  if(!empty($AlumnoLogueado)){
            $_SESSION['Alumno_Nombre'] = $AlumnoLogueado['NOMBRE'];
            $_SESSION['Alumno_Apellido'] = $AlumnoLogueado['APELLIDO'];
            $_SESSION['Alumno_Curso'] = $AlumnoLogueado['CURSO'];
          $_SESSION['Alumno_Division'] = $AlumnoLogueado['DIVISION'];
          $_SESSION['Alumno_Turno'] = $AlumnoLogueado['TURNO'];
           $_SESSION['Alumno_Materia'] = $AlumnoLogueado['MATERIA'];
           $_SESSION['Alumno_Fecha'] = $AlumnoLogueado['FECHA'];
     header('location:ReportesActavolante-pdf-php/index.php');
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
          <p>Acta Volante</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Acta Volante</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Acta Volante Coloquio Diciembre</h3>
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
  <label class="control-label">Materia </label> 
  <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Materias" class="form-control form-control-user" id="materias">
    <optgroup label="Ciclo Basico" style=" background: #F0B27A;">
<option value="" >Selecciona...</option>
<?php 
for($i=0;$i<$CantidadNombre;$i++) {
if(!empty($_POST['Nombre'])&& $_POST['Nombre']==  $ListadoNombre[$i]['ID']){
$selected='selected';}
else{
$selected='';
}
 ?>
<option value="<?php echo $ListadoNombre[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoNombre[$i]['NOMBRE'];  ?></option>
<?php } ?>
</optgroup>
<optgroup label="Ciclo Orientado"style=" background: #85C1E9;">
<!--<option value="" >Selecciona...</option>-->
<?php 
for($i=0;$i<$CantidadNombreor;$i++) {
if(!empty($_POST['Nombre'])&& $_POST['Nombre']==  $ListadoNombreor[$i]['ID']){
$selected='selected';}
else{
$selected='';
}
 ?>
<option value="<?php echo $ListadoNombreor[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoNombreor[$i]['NOMBRE'];  ?></option>
<?php } ?>
</optgroup>
</select>

                    </div>
<div class="col-sm-6 mb-3 mb-sm-0"  id="Select2lista">


<label class="control-label">Curso </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Curso" class="form-control form-control-user" id="curso">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCurso;$i++) {
if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoCurso[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> 


</div>
</div>
<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
 <label class="control-label">Division </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Division" class="form-control form-control-user" id="division">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadDivision;$i++) {
if(!empty($_POST['Division'])&& $_POST['Division']==  $ListadoDivision[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoDivision[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoDivision[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> 
                    </div>
<div class="col-sm-6 mb-3 mb-sm-0">
  <label class="control-label">Turno </label>
                     <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Turno" class="form-control form-control-user" id="turno">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadTurno;$i++) {
if(!empty($_POST['Turno'])&& $_POST['Turno']==  $ListadoTurno[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoTurno[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoTurno[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> </div>
</div>
   <div class="tile-footer">

    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="actavolante.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a><img  src= "icon/stick-figure-walk-low-battery--unscreen.gif" style="width:15%; position: absolute; right: 8%" />
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