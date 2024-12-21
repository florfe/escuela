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
require_once 'funciones/listar_ciclos.php'; 
$ListadoCiclos=Listar_Ciclos($MiConexion);
$CantidadCiclos=count($ListadoCiclos);
require_once 'funciones/listar_curso2.php'; 
$ListadoCurso=Listar_Curso($MiConexion);
$CantidadCurso=count($ListadoCurso);
require_once 'funciones/listar_turno.php'; 
$ListadoTurno=Listar_Turno($MiConexion);
$CantidadTurno=count($ListadoTurno);
require_once 'funciones/listar_division.php'; 
$ListadoDivision=Listar_Division($MiConexion);
$CantidadDivision=count($ListadoDivision);
require_once 'funciones/listar_mesas.php'; 
$ListadoMesas=Listar_Mesas($MiConexion);
$CantidadMesas=count($ListadoMesas);
require_once 'funciones/listar_materias.php'; 
$ListadoNombre=Listar_Listamaterias($MiConexion);
$CantidadNombre=count($ListadoNombre);
require_once 'funciones/listar_materiasorientado.php'; 
$ListadoNombreor=Listar_Listamateriasori($MiConexion);
$CantidadNombreor=count($ListadoNombreor);
require_once 'funciones/listar_estadoexamen.php'; 
$ListadoEstadoExamen=Listar_EstadoExamen($MiConexion);
$CantidadEstadoExamen=count($ListadoEstadoExamen);

require_once 'funciones/validar_examen.php'; 
require_once 'funciones/insertar_examen.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_Examen();
if(empty($Mensaje)){
  if(InsertarExamen($MiConexion)!= false) {
    $Mensaje= 'Exámen cargado!';
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
     <?php require_once 'slideralumnos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registrar Exámen</h1>
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
            <h3 class="tile-title">Ingresa datos de exámenes<img  src= "icon/looking-over-cheating-anim-md--unscreen.gif" style="width:15%; position: absolute; right: 15%" /></h3>
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
<label class="control-label">Alumno </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Alumnos" class="form-control form-control-user" id="alumnos">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadAlumnos;$i++) {
if(!empty($_POST['Alumnos'])&& $_POST['Alumnos']==  $ListadoAlumnos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoAlumnos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoAlumnos[$i]['APELLIDO'], $ListadoAlumnos[$i]['NOMBRE'];  ?></option>
<?php } ?>
</select> 
                    </div>
                               </div>



<div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Mesa de exámen</label> 
<select name="Mesa" class="form-control form-control-user" id="mesa">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadMesas;$i++) {
if(!empty($_POST['Mesa'])&& $_POST['Mesa']==  $ListadoMesas[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoMesas[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMesas[$i]['DENOMINACION'];  ?></option>
<?php } ?>
</select> 
                    
                    </div> 
                  
                    </div>


<div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Materia</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
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

<div class="col-sm-6">
<label class="control-label">Curso</label>  <i class="fa fa-asterisk" aria-hidden="true"></i>
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
  


                   <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="examenalumnos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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