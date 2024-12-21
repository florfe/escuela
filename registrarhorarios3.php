<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

require_once 'funciones/listar_listacursoori.php'; 
$ListadoCurso3=Listar_Listacursosori($MiConexion);
$CantidadCurso3=count($ListadoCurso3);

require_once 'funciones/listar_horario_ingreso2.php'; 
$ListadoHorario_ingreso=Listar_Horario_ingreso($MiConexion);
$CantidadHorario_ingreso=count($ListadoHorario_ingreso);
require_once 'funciones/listar_horarios_salida2.php'; 
$ListadoHorario_salida=Listar_Horario_salida($MiConexion);
$CantidadHorario_salida=count($ListadoHorario_salida);
require_once 'funciones/listar_dia.php'; 
$ListadoDia=Listar_Dia($MiConexion);
$CantidadDia=count($ListadoDia);
require_once 'funciones/listar_hora.php'; 
$ListadoHora=Listar_Hora($MiConexion);
$CantidadHora=count($ListadoHora);

require_once 'funciones/listar_materiasorientado.php'; 
$ListadoMateriasori=Listar_Listamateriasori($MiConexion);
$CantidadMateriasori=count($ListadoMateriasori);
require_once 'funciones/validar_horario.php'; 
require_once 'funciones/insertar_cursoscompletos2.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_Horario();
if(empty($Mensaje)){
  if(InsertarCursoscompletos2($MiConexion)!= false  ) {
    $Mensaje= 'Datos cargados!';
    $_POST= array();
   $Estilo='success';
}}}
//$cursos="SELECT cur.Id, cur.Curso, cur.Division, cur.Turno, comp.IdCurso, comp.Hora, comp.Horario_ingreso, comp.Horario_salida, comp.Dia, comp.Materia 
//FROM cursoscompletos as cur, hora as comp
//WHERE cur.Id=comp.IdCurso
//order by cur.Curso, cur.Division, cur.Turno, comp.Dia, comp.Hora ";


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
          <h1><i class="fa fa-edit"></i> Registrar Horarios y Materias</h1>
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
            <h3 class="tile-title">Ciclo Orientado Turno Mañana<img  src= "icon/marching-bass-drum-player-md-n-unscreen.gif" style="width:10%; position: absolute; right:1%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable" style="width: 49%">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
              </div>
                <div class="bs-component">
                <div class="alert alert-dismissible alert-info"  style="width: 49%" >
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post">
                <!-- RENGLON UNO  curso y materia-->
<div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Curso </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="IdCurso" class="form-control form-control-user" id="idCurso" >
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCurso3;$i++) {
if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso3[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoCurso3[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso3[$i]['CURSO'], $ListadoCurso3[$i]['DIVISION'], $ListadoCurso3[$i]['TURNO']?></option>
<?php } ?>
</select> 
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Materia </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select>  <!-- RENGLON UNO  hora y dia-->
                                </div></div>
<div class="form-group row">
 <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Hora </label> 
  <select name="Denominacion" class="form-control form-control-user" id="denominacion">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadHora;$i++) {
                  if(!empty($_POST['Denominacion'])&& $_POST['Denominacion']==  $ListadoHora[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoHora[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoHora[$i]['DENOMINACION' ]; ?></option>
                  <?php } ?>
                  </select> 
                    </div>
                    <div class="col-sm-6">
<label class="control-label">Dia</label> <i class="fa fa-asterisk" aria-hidden="true"> </i>
<select name="Dia" class="form-control form-control-user" id="dia">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadDia;$i++) {
if(!empty($_POST['Dia'])&& $_POST['Dia']==  $ListadoDia[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoDia[$i]['DIA'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoDia[$i]['DIA' ]; ?></option>
<?php } ?>
</select> <!-- RENGLON UNO  ing y sal-->
                    </div> </div>
             <div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Horario ingreso</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Horario_ingreso" class="form-control form-control-user" id="horario_ingreso">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadHorario_ingreso;$i++) {
if(!empty($_POST['Horario_ingreso'])&& $_POST['Horario_ingreso']==  $ListadoHorario_ingreso[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoHorario_ingreso[$i]['HORARIO_INGRESO'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoHorario_ingreso[$i]['HORARIO_INGRESO' ]; ?></option>
<?php } ?>
</select> 
                    </div> 
                    <div class="col-sm-6">
<label class="control-label">Horario salida </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Horario_salida" class="form-control form-control-user" id="horario_salida">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadHorario_salida;$i++) {
if(!empty($_POST['Horario_salida'])&& $_POST['Horario_salida']==  $ListadoHorario_salida[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoHorario_salida[$i]['HORARIO_SALIDA'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoHorario_salida[$i]['HORARIO_SALIDA' ]; ?></option>
<?php } ?>
</select> 
                    </div>
                    </div>
                          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registrarhorarios.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </div>
            </form>
    
<!--<HR></HR>

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
                    <th>Materia</th>
                     <th>Hora</th>
                      <th>Dia</th>
                       <th>Ingreso</th>
                        <th>Salida</th>
                    
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

                  <td> <?php echo $fila['Materia']; ?></td>
                  <td> <?php echo $fila['Hora']; ?></td>
                  <td> <?php echo $fila['Dia']; ?></td>
                  <td> <?php echo $fila['Horario_ingreso']; ?></td>
                  <td> <?php echo $fila['Horario_salida']; ?></td>

            </tr> <?php }  ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>-->

















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