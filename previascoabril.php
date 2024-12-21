<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listarcursoorientado.php'; 
$ListadoCurso=Listar_Cursobasico($MiConexion);
$CantidadCurso=count($ListadoCurso);
require_once 'funciones/listar_turno.php'; 
$ListadoTurno=Listar_Turno($MiConexion);
$CantidadTurno=count($ListadoTurno);
require_once 'funciones/listardiviorientado.php'; 
$ListadoDivision=Listar_Division($MiConexion);
$CantidadDivision=count($ListadoDivision);
require_once 'funciones/listar_materiasorientado.php'; 
$ListadoListamaterias=Listar_Listamateriasori($MiConexion);
$CantidadListamaterias=count($ListadoListamaterias);

require_once 'funciones/listardocentescicloorientado.php'; 
$ListadoDocentes=Listar_Docentes($MiConexion);
$CantidadDocentes=count($ListadoDocentes);
require_once 'funciones/validar_cursomateria2.php'; 
require_once 'funciones/insertar_previasabril.php'; 

$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_RegistroCursos();
if(empty($Mensaje)){
  if(InsertarPrevias($MiConexion)!= false) {
    $Mensaje= 'Previa cargada!';
    $_POST= array();
   $Estilo='success';
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
     <?php require_once 'sliderexamen.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registrar Previas Ciclo Orientado</h1>
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
            <h3 class="tile-title">Ingresa los datos solicitados<img  src= "icon/your-decision-now-md-nwm-v2-unscreen.gif" style="width:18%; position: absolute; right:15%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable" style="width: 49%">
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
     

           
                    <div class="form-group row"><div class="col-sm-6">
                      <h2>Previas Abril</h2>
<label class="control-label">Curso </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="IdCurso" class="form-control form-control-user" id="idCurso">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCurso;$i++) {
if(!empty($_POST['IdCurso'])&& $_POST['IdCurso']==  $ListadoCurso[$i]['ID']){
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
             
  <label class="control-label">Materia </label> 
  <i class="fa fa-asterisk" aria-hidden="true"></i>
  <select name="Materias" class="form-control form-control-user" id="materias">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadListamaterias;$i++) {
if(!empty($_POST['Nombre'])&& $_POST['Nombre']==  $ListadoListamaterias[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoListamaterias[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoListamaterias[$i]['NOMBRE'];  ?></option>
<?php } ?>
</select> 
                    </div> 
                     <div class="col-sm-6 "><label class="control-label">Fecha de Previa </label> 
      <i class="fa fa-asterisk" aria-hidden="true"></i>
      <input type="date" id="fecha" class="form-control form-control-user" name="Fecha" min="2023-03-30" max="2023-05-01">
      </div></div>
   
 <div class="form-group row">

     
            <div class="col-sm-6 mb-3 mb-sm-0">
             
  <label class="control-label">Hora de  Previa</label> 
  
   <input type="time" id="hora" class="form-control form-control-user" name="Hora" min="07:50" max="18:30">
                    </div> 
                            
<div class="col-sm-6 mb-3 mb-sm-0">
             
  <label class="control-label">Docente - Presidente</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
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
                    </div> </div>
<div class="form-group row">
<div class="col-sm-6 mb-3 mb-sm-0">
             
  <label class="control-label">Docente - Vocal 1 </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Docentes2" class="form-control form-control-user" id="docentes2">
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


<div class="col-sm-6 mb-3 mb-sm-0">
             
  <label class="control-label">Docente - Vocal 2</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Docentes3" class="form-control form-control-user" id="docentes3">
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
                    </div> </div>
                                   
                          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="previascofeb.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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