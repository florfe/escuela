<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_cargos.php'; 
$ListadoCargo=Listar_Cargos($MiConexion);
$CantidadCargo=count($ListadoCargo);
require_once 'funciones/listar_materias.php'; 
$ListadoNombre=Listar_Listamaterias($MiConexion);
$CantidadNombre=count($ListadoNombre);
require_once 'funciones/listar_materiasorientado.php'; 
$ListadoNombreor=Listar_Listamateriasori($MiConexion);
$CantidadNombreor=count($ListadoNombreor);
require_once 'funciones/listar_docentes.php'; 
$ListadoDocentes=Listar_Docentes($MiConexion);
$CantidadDocentes=count($ListadoDocentes);
require_once 'funciones/listar_estado.php'; 
$ListadoEstado=Listar_Estado($MiConexion);
$CantidadEstado=count($ListadoEstado);
require_once 'funciones/listar_ciclos.php'; 
$ListadoCiclos=Listar_Ciclos($MiConexion);
$CantidadCiclos=count($ListadoCiclos);
require_once 'funciones/listar_cursostodos.php'; 
$ListadoCurso=Listar_Curso($MiConexion);
$CantidadCurso=count($ListadoCurso);
require_once 'funciones/listar_turno.php'; 
$ListadoTurno=Listar_Turno($MiConexion);
$CantidadTurno=count($ListadoTurno);
require_once 'funciones/listar_division.php'; 
$ListadoDivision=Listar_Division($MiConexion);
$CantidadDivision=count($ListadoDivision);
require_once 'funciones/validar_datosLaboral.php'; 
require_once 'funciones/insertar_docentes2.php'; 
require_once 'funciones/insertar_docentes3.php'; 
require_once 'funciones/insertar_docentes4.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_DatosLaboral();
if(empty($Mensaje)){
  if(InsertarDocentes2($MiConexion)!= false && InsertarDocentes3($MiConexion)!= false  && InsertarDocentes4($MiConexion)!= false){
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
            <h3 class="tile-title">Ingresa los datos laborales<img  src= "icon/Lrkn-unscreen.gif" style="width:20%; position:  absolute; right:4%" /></h3>
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
 </div>
<div class="col-sm-6">
  <label class="control-label">Escalafon Docente </label> 
<input type="date" class="form-control form-control-user" name="Escalafon" id="escalafon" 
style="width: 49%">
                  </div> 
                    </div> 
<!-- RENGLON DOS  -->
                   <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
  <label class="control-label">Cargo </label> 
<select name="Cargo" class="form-control form-control-user" id="cargo">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCargo;$i++) {
if(!empty($_POST['Cargo'])&& $_POST['Cargo']==  $ListadoCargo[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoCargo[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCargo[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> 
                    </div>
<div class="col-sm-6">
  <label class="control-label">Estado Docente </label> 
<select name="Estado" class="form-control form-control-user" id="estado"style="width: 49%">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadEstado;$i++) {
if(!empty($_POST['Estado'])&& $_POST['Estado']==  $ListadoEstado[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoEstado[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoEstado[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> 
                    </div> 
                    </div> 
               <div class="form-group row">
                <div class="col-sm-6 " id="Ciclos"><label class="control-label">Ciclo </label> 
              <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Ciclos" class="form-control form-control-user" id="ciclos">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCiclos;$i++) {
if(!empty($_POST['Ciclos'])&& $_POST['Ciclos']==  $ListadoCiclos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
 
    ?>
<option value="<?php echo $ListadoCiclos[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCiclos[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> 
              </div>



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
<option value="" >Selecciona...</option>
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
 
</div>
<!-- RENGLON TRES  VENCIMIENTO DNI Y CUIL -->
 <div class="form-group row">
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

  </div>
           <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargadocentes3.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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