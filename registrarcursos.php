<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
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

require_once 'funciones/validar_registrocursos.php'; 
require_once 'funciones/insertar_cursoscompletos.php'; 

$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_RegistroCursos();
if(empty($Mensaje)){
  if(InsertarCursoscompletos($MiConexion)!= false) {
    $Mensaje= 'Datos cargados!';
    $_POST= array();
   $Estilo='success';
}}}
$cursos="SELECT Id, Curso, Division, Turno, Ciclos FROM cursoscompletos";
 require_once 'header.inc.php'; 
 ?>
</head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php require_once 'menu.inc.php'; ?>
    <?php require_once 'user.inc.php'; ?>
      </header>
    <!-- Sidebar menu-->
     <?php require_once 'slidercursos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Cursos</h1>
          <p>Registro de cursos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Curso</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa los datos solicitados</h3>

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
             <form class="user" method="post">
              <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Curso </label>
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
               <div class="col-sm-6"><label class="control-label">Division </label>
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
                                      <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Turno </label>
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

                                      
                                    <div class="col-sm-6"><label class="control-label">Ciclo </label>
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
                                      </div></div>
        <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registrarcursos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
<HR></HR>

 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Datos ingresados<img  src= "icon/stick-figure-stuck-door-md-nwm-unscreen.gif" style="width:18%; position: absolute; right:2%" /></h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Curso</th>
                    <th>Division</th>
                    <th>Turno</th>
                    <th>Ciclo</th>
                    
                  </tr>
                </thead>
                <tbody>
              <?php
                 $lista=mysqli_query($MiConexion, $cursos); 
                
                 while ($fila = mysqli_fetch_array($lista))
                { ?>
            <tr > 
                  <td><?php echo $fila['Id']; ?></td>
                  <td> <?php echo $fila['Curso']; ?></td>
                  <td> <?php echo $fila['Division']; ?></td>
                  <td> <?php echo $fila['Turno']; ?></td>
                  <td> <?php echo $fila['Ciclos']; ?></td>
            </tr> <?php }  ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>

            
          </div>
        </div>
      </div></main>
    
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