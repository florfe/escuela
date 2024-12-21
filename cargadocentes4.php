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
require_once 'funciones/validar_conceptos.php'; 
require_once 'funciones/insertar_documentacion.php';
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_Conceptos();
if(empty($Mensaje)){
  if(InsertarDocumentacion($MiConexion)!= false ) {
    $Mensaje= 'Datos cargados!';
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
            <h3 class="tile-title">Ingresa documentación entregada<img  src= "icon/S9Ih-unscreen.gif" style="width:20%; position: absolute; right: 5%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable"style="width: 49%">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
              </div>
              <div class="bs-component">
                <div class="alert alert-dismissible alert-info" style="width: 49%">
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post">
                <!-- RENGLON UNO  -->
                <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Docente </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
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
                    </div></div>
                 <div class="form-group row">   
                        <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Documentacion </label> 
                        </div ></div>
                       <div class="form-group row">   
                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                     <div class="form-check">     
<label class="form-check-label">
  <input name="checkbox1" value="0" type="hidden">
<input class="form-check-input"type="checkbox"  name='checkbox1' value='Fotocopia DNI actualizado '<?php echo(!empty($_POST['checkbox1']) && $_POST['checkbox1']==1) ? 'Checked': ' '; ?>>Fotocopia DNI actualizado </label></div>
                          <div class="form-check">
<label class="form-check-label">
  <input name="checkbox2" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox2'value='Constancia de Servicios'<?php echo(!empty($_POST['checkbox2']) && $_POST['checkbox2']==2) ? 'Checked': ' '; ?>>Constancia de Servicios </label> </div>
                            <div class="form-check">
<label class="form-check-label">
  <input name="checkbox3" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox3'value='Regimen de Incompatibilidades'<?php echo(!empty($_POST['checkbox3']) && $_POST['checkbox3']==3) ? 'Checked': ' '; ?> >Regimen de Incompatibilidades </label> </div>
                                     <div class="form-check">
<label class="form-check-label">
  <input name="checkbox4" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox4' value='Certificado de Delitos Sexuales'<?php echo(!empty($_POST['checkbox4']) && $_POST['checkbox4']==4) ? 'Checked': ' '; ?>>Certificado de Delitos Sexuales </label> </div>
                              </div>
<div class="col-sm-6">
                         <div class="form-check">
<label class="form-check-label">
  <input name="checkbox5" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox5'value='Titulo Docente'<?php echo(!empty($_POST['checkbox5']) && $_POST['checkbox5']==5) ? 'Checked': ' '; ?> >Titulo Docente </label> </div>
                          <div class="form-check">
<label class="form-check-label">
  <input name="checkbox6" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox6' value='Apto Psicofisico'<?php echo(!empty($_POST['checkbox6']) && $_POST['checkbox6']==6) ? 'Checked': ' '; ?>>Apto Psicofisico </label> </div>
                            <div class="form-check">
<label class="form-check-label">
  <input name="checkbox7" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox7'value='ART (carnet) '<?php echo(!empty($_POST['checkbox7']) && $_POST['checkbox7']==7) ? 'Checked': ' '; ?> >ART (carnet) </label> </div>
                                  <div class="form-check">
<label class="form-check-label">
  <input name="checkbox8" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox8' value='Copia carnet de Vacunas'<?php echo(!empty($_POST['checkbox8']) && $_POST['checkbox8']==8) ? 'Checked': ' '; ?>>Copia carnet de Vacunas </label> </div>
                              </div> 
                    </div> 
 <!-- RENGLON DOS  -->
     <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargadocentes4.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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