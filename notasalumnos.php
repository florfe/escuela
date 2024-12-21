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
require_once 'funciones/listar_cursoscompletos2.php';
$ListadoCursosCompletos=Listar_Cursos($MiConexion);
$CantidadCursosCompletos=count($ListadoCursosCompletos);
require_once 'funciones/listar_materias.php'; 
$ListadoNombre=Listar_Listamaterias($MiConexion);
$CantidadNombre=count($ListadoNombre);
require_once 'funciones/listar_materiasorientado.php'; 
$ListadoNombreor=Listar_Listamateriasori($MiConexion);
$CantidadNombreor=count($ListadoNombreor);
require_once 'funciones/listar_evaluacion.php'; 
$ListadoNotas=Listar_Notas($MiConexion);
$CantidadNotas=count($ListadoNotas);
 
require_once 'funciones/validar_notas.php'; 
require_once 'funciones/insertar_notas.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_Notas();
if(empty($Mensaje)){
  if(InsertarNotas($MiConexion)!= false) {
    $Mensaje= 'Notas cargadas!';
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
          <h1><i class="fa fa-edit"></i> Registrar Notas</h1>
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
            <h3 class="tile-title">Ingresa datos de notas<img  src= "icon/stick-figure-counting-fingers--unscreen.gif" style="width:15%; position: absolute; right: 20%" /></h3>
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
  <div class="col-sm-6">
<label class="control-label">Etapa </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Etapa" class="form-control form-control-user" id="etapa" onchange="getStudents()">
      <option value="">Selecciona...</option>
      <option value="1">Primera Etapa</option>
      <option value="2">Segunda Etapa</option>
      <option value="3">Final</option>
    </select>
                    </div>
                    </div>
                    <div class="form-group row">

 <div class="col-sm-6">
<label class="control-label">Curso </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Curso" class="form-control form-control-user" id="curso" onchange="getStudents()">
      <option value="">Selecciona...</option>
      <?php
      for ($i = 0; $i < $CantidadCursosCompletos; $i++) {
        if (!empty($_POST['Curso']) && $_POST['Curso'] == $ListadoCursosCompletos[$i]['ID']) {
          $selected = 'selected';
        } else {
          $selected = '';
        }
        ?>
        <option value="<?php echo $ListadoCursosCompletos[$i]['ID']; ?>" <?php echo $selected; ?>><?php echo $ListadoCursosCompletos[$i]['CURSO'], $ListadoCursosCompletos[$i]['DIVISION']; ?><?php echo $ListadoCursosCompletos[$i]['TURNO']; ?></option>
      <?php } ?>
    </select>
                    
                    </div>

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

             
                  </div>
                   <HR></HR>

 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Cargar inasistencias</h3>
            <div class="table-responsive">
              
              <table class="table">
                <?php if($etapa="1"){ 
              ?>
                <thead>
             
                </thead>
<?php } elseif($etapa="2"){ 
    ?>
     <thead>
                  <tr>

                    <!--<th>#</th>-->
                    <th>Alumno</th>
                  
                    <th>E5</th>
                    <th>R1</th>
                    <th>R2</th>
                     <th>E6</th>
                    <th>R1</th>
                    <th>R2</th>
                     <th>E7</th>
                    <th>R1</th>
                    <th>R2</th>
                     <th>E8</th>
                    <th>R1</th>
                    <th>R2</th>
                    
                    <th>J2</th>
                     <th>R1</th>
                     
                    
                  </tr>
                </thead>
                <?php } elseif($etapa="3"){ 
    ?>
     <thead>
                  <tr>

                    <!--<th>#</th>-->
                    <th>Alumno</th>
                  
                   
                      <th>Dic</th>
                       <th>Feb</th>
                        <th>Prom</th>
                    
                  </tr>
                </thead>
                <?php 
  }

?>

                <tbody id="studentsTableBody">



             
                  </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>

                  



  


                   <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="notasalumnos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
    <script>
function getStudents() {
    var selectedCourse = document.getElementById('curso').value;
    var selectedStage = document.getElementById('etapa').value;
    $.ajax({
      type: 'POST',
      url: 'get_students2.php', // Replace with the actual URL to fetch students
      data: { CursoId: selectedCourse, Etapa: selectedStage }, // Corrected to pass as an object
      dataType: 'html', // Specify the expected response type
      success: function (data) {
        var output = '';
        if (selectedStage === '1') {
          output = '<tr>';
                output += '<th>Alumno</th>';
                output += '<th>E1</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>E2</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>E3</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>E4</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>J1</th>';
                output += '<th>R1</th>';
                output += '</tr>';

       
            } else if (selectedStage === '2') {
              // Update the table structure for stage 2
                output = '<tr>';
                output += '<th>Alumno</th>';
                output += '<th>E5</th>';
                 output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>E6</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>E7</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>E8</th>';
                output += '<th>R1</th>';
                output += '<th>R2</th>';
                output += '<th>J2</th>';
                output += '<th>R1</th>';
                output += '</tr>';



               
               
            } else if (selectedStage === '3') {
                // Update the table structure for stage 3
                output = '<tr>';
                output += '<th>Alumno</th>';
                output += '<th>Dic</th>';
                // ... continue with other headers for stage 3
                output += '</tr>';
              
            } else {
                console.log('Invalid stage selected');
                return;
            }
             $('#studentsTableBody').html(data); // Assuming data is already formatted for stage 1
        },
        error: function () {
            console.log('Error fetching students');
        }
    });
}
</script>
<script> function colorChange(e){
  let div = e.parentNode;
  switch(e.value){
  case '10':
      div.style.backgroundColor = "#52BE80";
      break;
  case '9':
      div.style.backgroundColor = "#52BE80";
      break;
  case '8':
      div.style.backgroundColor = "#52BE80";
      break;
    case '7':
      div.style.backgroundColor = "#52BE80";
      break;



  case '6':
      div.style.backgroundColor = "#CD6155";
      break;
  case '5':
      div.style.backgroundColor = "#CD6155";
      break;
  case '4':
      div.style.backgroundColor = "#CD6155";
      break;
    case '3':
      div.style.backgroundColor = "#CD6155";
      break;
    case '2':
      div.style.backgroundColor = "#CD6155";
      break;
    case '1':
      div.style.backgroundColor = "#CD6155";
      break;
    default:
      div.style.backgroundColor = "";
      break;
  }
}
</script>
    <!-- Page specific javascripts-->
     </body>
</html>