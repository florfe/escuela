<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listarcursobasico.php'; 
$ListadoCurso=Listar_Cursobasico($MiConexion);
$CantidadCurso=count($ListadoCurso);
require_once 'funciones/listar_turno.php'; 
$ListadoTurno=Listar_Turno($MiConexion);
$CantidadTurno=count($ListadoTurno);
require_once 'funciones/listardivibasico.php'; 
$ListadoDivision=Listar_Division($MiConexion);
$CantidadDivision=count($ListadoDivision);

require_once 'funciones/validar_cursomateria.php'; 
require_once 'funciones/insertar_materias.php'; 

$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$mat = $_POST['Nombre'];
$cur = $_POST['IdCurso'];
$div = $_POST['IdDivision'];
$tur = $_POST['IdTurno'];
  $checkIfExistsQuery = "SELECT * FROM materias WHERE Nombre = '$mat' and IdCurso = '$cur' and IdDivision = '$div' and IdTurno = '$tur' ";
    $result = mysqli_query($MiConexion, $checkIfExistsQuery);

    // If any records are returned, the teacher already exists
    if (mysqli_num_rows($result) > 0) {
        $Mensaje = 'La materia ya existe para ese curso.';
        $Estilo = 'danger';
    } else {
$Mensaje= Validar_RegistroCursos();
if(empty($Mensaje)){
  if(InsertarMaterias($MiConexion)!= false) {
    $Mensaje= 'Materias cargadas!';
    $_POST= array();
   $Estilo='success';
}
}
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
     <?php require_once 'slidermaterias.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registrar Materias Ciclo Basico</h1>
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
            <h3 class="tile-title">Ingresa los datos solicitados<img  src= "icon/students-studying-for-class-md-unscreen.gif" style="width:18%; position: absolute; right:15%" /></h3>
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
     

           <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <h2>Ciclo Basico</h2>
  <label class="control-label">Materia </label> 
  <i class="fa fa-asterisk" aria-hidden="true"></i>
<input type="text" class="form-control form-control-user" name="Nombre" id="nombre" 
>
                    
                    
                    </div> </div>
                    <div class="form-group row"><div class="col-sm-6">
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
                     <label class="control-label">Turno </label>
                     <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="IdTurno" class="form-control form-control-user" id="idTurno">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadTurno;$i++) {
if(!empty($_POST['IdTurno'])&& $_POST['IdTurno']==  $ListadoTurno[$i]['ID']){
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
<select name="IdDivision" class="form-control form-control-user" id="idDivision">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadDivision;$i++) {
if(!empty($_POST['IdDivision'])&& $_POST['IdDivision']==  $ListadoDivision[$i]['ID']){
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
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="ciclobasico.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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