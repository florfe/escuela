<?php
  session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_curso.php'; 
$ListadoCurso=Listar_Curso($MiConexion);
$CantidadCurso=count($ListadoCurso);
require_once 'funciones/listar_turno.php'; 
$ListadoTurno=Listar_Turno($MiConexion);
$CantidadTurno=count($ListadoTurno);
require_once 'funciones/listar_division.php'; 
$ListadoDivision=Listar_Division($MiConexion);
$CantidadDivision=count($ListadoDivision);
require_once 'funciones/validacion_constancia.php'; 

$Mensaje='';
if(!empty($_POST['BotonLogin'])){
    require_once 'funciones/loginasistalum.php';
    $UsuarioLogueado = DatosLogin($_POST['email'], $_POST['password'], $MiConexion);
       
if(!empty($UsuarioLogueado)){
      $_SESSION['Usuario_Nombre']= $UsuarioLogueado['NOMBRE'];
      $_SESSION['Usuario_Apellido']= $UsuarioLogueado['APELLIDO'];
      $_SESSION['Usuario_IdTurno']= $UsuarioLogueado['IDTURNO'];
      $_SESSION['Usuario_IdDivision']= $UsuarioLogueado['IDDIVISION'];
      
     if($UsuarioLogueado['IDCURSO']==0 && $UsuarioLogueado['IDCURSO']>6){
        $Mensaje= 'No se encuentra activo.';
      }
      else  
        if($UsuarioLogueado['IDCURSO']==1 && $UsuarioLogueado['IDDIVISION']=="A"&& $UsuarioLogueado['IDTURNO']=="Mañana")
      
      {
      header('location: ReportesLibretasCursos-pdf-php.php');
      exit;
    
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
          <h1><i class="fa fa-edit"></i> Libretas</h1>
          <p>Libretas de alumnos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Libretas de alumnos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa Dni del alumno<img  src= "icon/cpr-chest-compressions-md-nwm--unscreen.gif" style="width:20%; position: absolute; right: 10%" /></h3>
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
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Curso </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
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
</div></div>
<div class="form-group row">
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
</select> 
                      </div>
<div class="col-sm-6">
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
                      </div></div>
   <div class="tile-footer">

    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="libretasalumnos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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