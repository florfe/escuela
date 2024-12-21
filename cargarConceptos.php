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
require_once 'funciones/validar_docente2.php'; 
require_once 'funciones/insertar_conceptos.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$doc = $_POST['Docentes'];
$congral = $_POST['ConceptoGeneral'];
 $consultaFechaExistente = "SELECT COUNT(*) AS existe FROM docentes WHERE Id = '$doc' and ConceptoGeneral='$congral'";
        $resultadoFechaExistente = mysqli_query($MiConexion, $consultaFechaExistente);
        $filaFechaExistente = mysqli_fetch_assoc($resultadoFechaExistente);

        if ($filaFechaExistente['existe'] > 0) {
 $Mensaje = 'El docente ya tiene un Concepto cargado.';
        $Estilo = 'danger';
    } else {


$Mensaje= Validar_Docente();
if(empty($Mensaje)){
  if(InsertarConceptos($MiConexion)!= false) {
    $Mensaje= 'Docente cargado!';
    $_POST= array();
   $Estilo='success';
}}}}
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
            <h3 class="tile-title">Ingresa el concepto docente<img  src= "icon/7c934f78e8676c8ae5d758ee9eea05-unscreen.gif" style="width:13%; position: absolute; right:6%" /></h3>
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
                    <!--1-->
<div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">1) Preparacion profesional (Actualizacion y superacion, perfeccionamiento y cultura general) </label> 
<select name="Conceptos1" class="form-control form-control-user" id="conceptos1">
<option value="" >Conceptos...</option>
<?php for($i=0;$i<$CantidadConceptos;$i++) {
if(!empty($_POST['Conceptos'])&& $_POST['Conceptos']==  $ListadoConceptos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
              <div class="col-sm-6" >
<label class="control-label">* selecciona concepto y puntaje </label> 
<select name="Puntos1" class="form-control form-control-user" id="puntos1" style="width: 49%">
<option value="" >Puntos...</option>
<?php for($i=0;$i<$CantidadPuntos;$i++) {
if(!empty($_POST['Puntos'])&& $_POST['Puntos']==  $ListadoPuntos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
                  </div>
<!--2-->
<div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">2) Aptitudes Docentes (Trabajo, conduccion, comunicacion, formacion y orientacion) </label> 
<select name="Conceptos2" class="form-control form-control-user" id="conceptos2">
<option value="" >Conceptos...</option>
<?php for($i=0;$i<$CantidadConceptos;$i++) {
if(!empty($_POST['Conceptos'])&& $_POST['Conceptos']==  $ListadoConceptos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
              <div class="col-sm-6">
<label class="control-label">* selecciona concepto y puntaje </label>
<select name="Puntos2" class="form-control form-control-user" id="puntos2"style="width: 49%">
<option value="" >Puntos...</option>
<?php for($i=0;$i<$CantidadPuntos;$i++) {
if(!empty($_POST['Puntos'])&& $_POST['Puntos']==  $ListadoPuntos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
                  </div>
              <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">3) Espiritu de iniciativa, de colaboracion y  laboriosidad </label> 
<select name="Conceptos3" class="form-control form-control-user" id="conceptos3">
<option value="" >Conceptos...</option>
<?php for($i=0;$i<$CantidadConceptos;$i++) {
if(!empty($_POST['Conceptos'])&& $_POST['Conceptos']==  $ListadoConceptos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
              <div class="col-sm-6">
<label class="control-label">* selecciona concepto y puntaje </label> 
<select name="Puntos3" class="form-control form-control-user" id="puntos3">
<option value="" >Puntos...</option>
<?php for($i=0;$i<$CantidadPuntos;$i++) {
if(!empty($_POST['Puntos'])&& $_POST['Puntos']==  $ListadoPuntos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
                  </div>
                     <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">4) Condiciones personales (Presentacion, trato  con los alumnos, con los superiores) </label> 
<select name="Conceptos4" class="form-control form-control-user" id="conceptos4">
<option value="" >Conceptos...</option>
<?php for($i=0;$i<$CantidadConceptos;$i++) {
if(!empty($_POST['Conceptos'])&& $_POST['Conceptos']==  $ListadoConceptos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
              <div class="col-sm-6">
<label class="control-label">* selecciona concepto y puntaje </label> 
<select name="Puntos4" class="form-control form-control-user" id="puntos4">
<option value="" >Puntos...</option>
<?php for($i=0;$i<$CantidadPuntos;$i++) {
if(!empty($_POST['Puntos'])&& $_POST['Puntos']==  $ListadoPuntos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
                  </div>          
    <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">5) Asistencia y puntuaidad</label> 
<select name="Conceptos5" class="form-control form-control-user" id="conceptos5">
<option value="" >Conceptos...</option>
<?php for($i=0;$i<$CantidadConceptos;$i++) {
if(!empty($_POST['Conceptos'])&& $_POST['Conceptos']==  $ListadoConceptos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
              <div class="col-sm-6">
<label class="control-label">* selecciona concepto y puntaje </label> 
<select name="Puntos5" class="form-control form-control-user" id="puntos5">
<option value="" >Puntos...</option>
<?php for($i=0;$i<$CantidadPuntos;$i++) {
if(!empty($_POST['Puntos'])&& $_POST['Puntos']==  $ListadoPuntos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoPuntos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoPuntos[$i]['PUNTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
                  </div>  
                  <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">CONCEPTO GENERAL</label> 
<select name="ConceptoGeneral" class="form-control form-control-user" id="conceptosGeneral">
<option value="" >Conceptos...</option>
<?php for($i=0;$i<$CantidadConceptos;$i++) {
if(!empty($_POST['Conceptos'])&& $_POST['Conceptos']==  $ListadoConceptos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoConceptos[$i]['CONCEPTOS'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoConceptos[$i]['CONCEPTOS'] ?></option>
<?php } ?>
</select> 
                    </div>
      </div>  
                          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargarConceptos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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