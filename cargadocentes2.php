<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_docentes.php'; 
$ListadoDocentes=Listar_Docentes($MiConexion);
$CantidadDocentes=count($ListadoDocentes);
require_once 'funciones/validar_datosAcademicos.php'; 
require_once 'funciones/insertar_academico.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_DatosAcademicos();
if(empty($Mensaje)){
  if(InsertarAcademico($MiConexion)!= false) {
    $Mensaje= 'Docente cargado!';
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
          <h1><i class="fa fa-edit"></i> Registrar Docente</h1>
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
            <h3 class="tile-title">Ingresa los datos academicos</h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
              </div>
                <div class="bs-component">
                <div class="alert alert-dismissible alert-info">
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post">
                <!-- RENGLON UNO  APELLIDO  Y NOMBRE-->
<div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Docente </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Docentes" class="form-control form-control-user" id="docentes">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadDocentes;$i++) {
if(!empty($_POST['Docentes'])&& $_POST['Docentes']==  $ListadoDocentes[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoDocentes[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoDocentes[$i]['APELLIDO'], $ListadoDocentes[$i]['NOMBRE'];  ?></option>
<?php } ?>
</select> 
                    </div>
              <div class="col-sm-6">
<label class="control-label">Nº de  Legajo </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<input type="text" class="form-control form-control-user" name="Legajo" id="legajo" 
 >
                    </div>
                  </div>
<div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Titulo </label> 
<input type="text" class="form-control form-control-user" id="titulo"name="Titulo" >
                    </div> <img  src= "icon/77868b266673edd8853247ef730ce0-unscreen.gif"style="width:15%; position: absolute; right: 8%" />
                    </div>
                    <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargadocentes2.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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