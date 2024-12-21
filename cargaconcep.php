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

require_once 'funciones/listar_conceptos.php'; 
$ListadoConceptos=Listar_Conceptos($MiConexion);
$CantidadConceptos=count($ListadoConceptos);

require_once 'funciones/listar_puntos.php'; 
$ListadoPuntos=Listar_Puntos($MiConexion);
$CantidadPuntos=count($ListadoPuntos);

require_once 'funciones/insertar_conceptos.php';
require_once 'funciones/validar_docente.php';
$Mensaje='';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])){
 $Mensaje= Validar_DatosCargaConceptos();
    if(InsertarConceptos($MiConexion)!= false ){ 
    $Mensaje= 'Docente cargado!';
    $_POST= array();
   $Estilo='success';


}}

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
          <h1><i class="fa fa-edit"></i> Certificados</h1>
          <p>Concepto Anual Docente</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Concepto Anual Docente</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa Dni del docente</h3>
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
             <form class="user" method="post" >

              <!-- RENGLON DOS  TIPO Y  NUMERO  DNI-->
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
                    
</div></div>

<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">1) Preparación Profesional (Actualización y superación, perfeccionamiento y cultura general)</label>
             <select name="IdConceptos1" class="form-control form-control-user" id="idConceptos1">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadConceptos;$i++) {
      if(!empty($_POST['IdConceptos1'])&& $_POST['IdConceptos1']==  $ListadoConceptos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoConceptos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?></option>
      <?php } ?>
      </select> 
    </div>
<div class="col-sm-6">
  <label class="control-label">*selecciona concepto y puntaje</label>
           <select name="IdPuntos1" class="form-control form-control-user" id="idPuntos1">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadPuntos;$i++) {
      if(!empty($_POST['IdPuntos1'])&& $_POST['IdPuntos1']==  $ListadoPuntos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'];  ?></option>
      <?php } ?>
      </select> 
</div></div>

<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">2) Aptitudes Docentes (Disciplinares, de trabajo, de conducción, de comunicación, Formación y orientación)</label>
           <select name="IdConceptos2" class="form-control form-control-user" id="idConceptos2">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadConceptos;$i++) {
      if(!empty($_POST['IdConceptos2'])&& $_POST['IdConceptos2']==  $ListadoConceptos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoConceptos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?></option>
      <?php } ?>
      </select> 
    </div>
<div class="col-sm-6">
  <label class="control-label">*selecciona concepto y puntaje</label>
           <select name="IdPuntos2" class="form-control form-control-user" id="idPuntos2">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadPuntos;$i++) {
      if(!empty($_POST['IdPuntos2'])&& $_POST['IdPuntos2']==  $ListadoPuntos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'];  ?></option>
      <?php } ?>
      </select> 
</div></div>

<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">3) Espiritu de iniciativa, de colaboracion y laboriosidad</label>
             <select name="IdConceptos3" class="form-control form-control-user" id="idConceptos3">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadConceptos;$i++) {
      if(!empty($_POST['IdConceptos3'])&& $_POST['IdConceptos3']==  $ListadoConceptos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoConceptos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?></option>
      <?php } ?>
      </select> 
    </div>
<div class="col-sm-6">
  <label class="control-label">*selecciona concepto y puntaje</label>
           <select name="IdPuntos3" class="form-control form-control-user" id="idPuntos3">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadPuntos;$i++) {
      if(!empty($_POST['IdPuntos3'])&& $_POST['IdPuntos3']==  $ListadoPuntos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'];  ?></option>
      <?php } ?>
      </select> 
</div></div>
<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">4) Condiciones personales (Presentacion, trato con los alumnos, con los superiores)</label>
             <select name="IdConceptos4" class="form-control form-control-user" id="idConceptos4">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadConceptos;$i++) {
      if(!empty($_POST['IdConceptos4'])&& $_POST['IdConceptos4']==  $ListadoConceptos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoConceptos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?></option>
      <?php } ?>
      </select> 
    </div>
<div class="col-sm-6">
  <label class="control-label">*selecciona concepto y puntaje</label>
           <select name="IdPuntos4" class="form-control form-control-user" id="idPuntos4">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadPuntos;$i++) {
      if(!empty($_POST['IdPuntos4'])&& $_POST['IdPuntos4']==  $ListadoPuntos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'];  ?></option>
      <?php } ?>
      </select> 
</div></div>
<div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">5) Asistencia y puntualidad</label>
             <select name="IdConceptos5" class="form-control form-control-user" id="idConceptos5">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadConceptos;$i++) {
      if(!empty($_POST['IdConceptos5'])&& $_POST['IdConceptos5']==  $ListadoConceptos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoConceptos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?></option>
      <?php } ?>
      </select> 
    </div>
<div class="col-sm-6">
  <label class="control-label">*selecciona concepto y puntaje</label>
           <select name="IdPuntos5" class="form-control form-control-user" id="idPuntos5">
      <option value="" >Selecciona...</option>
      <?php for($i=0;$i<$CantidadPuntos;$i++) {
      if(!empty($_POST['IdPuntos5'])&& $_POST['IdPuntos5']==  $ListadoPuntos[$i]['ID']){
      $selected='selected';}
      else{
      $selected='';} ?>
      <option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'];  ?></option>
      <?php } ?>
      </select> 
</div></div>


   <div class="tile-footer">

    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargaconcep.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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