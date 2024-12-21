<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_tipoDni.php'; 
$ListadoTipoDni=Listar_tipoDni($MiConexion);
$CantidadTipoDni=count($ListadoTipoDni);
require_once 'funciones/listar_tipoTel.php'; 
$ListadoTipoTel=Listar_tipoTel($MiConexion);
$CantidadTipoTel=count($ListadoTipoTel);
require_once 'funciones/listar_localidad.php'; 
$ListadoLocalidad=Listar_localidad($MiConexion);
$CantidadLocalidad=count($ListadoLocalidad);
require_once 'funciones/listar_barrio.php'; 
$ListadoBarrio=Listar_barrio($MiConexion);
$CantidadBarrio=count($ListadoBarrio);
require_once 'funciones/validacion_registro.php'; 
require_once 'funciones/insertar_docentes.php'; 
require_once 'funciones/insertar_dni.php';
 require_once 'funciones/cuil.php';
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
 $dni = $_POST['NumeroDni'];
    $checkIfExistsQuery = "SELECT * FROM docentes WHERE NumeroDni = '$dni'";
    $result = mysqli_query($MiConexion, $checkIfExistsQuery);

    // If any records are returned, the teacher already exists
    if (mysqli_num_rows($result) > 0) {
        $Mensaje = 'El docente ya existe en la base de datos.';
        $Estilo = 'danger';
    } else {


$Mensaje= Validar_Datos();
if(empty($Mensaje)){
if(InsertarDocentes($MiConexion)!= false && InsertarDni($MiConexion)!= false) {
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
    <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="cargadocentes.php">Registro</a></li>
    </ul>
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="tile">
    <h3 class="tile-title">Ingresa los datos personales <img  src= "icon/bb6246c85c65ddd0b35f8e6a817cb256.gif" style="width:20%; position: absolute; right:5%" /></h3>
    <div class="bs-component">
    <?php if(!empty($Mensaje)) { ?>
    <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable" style="width: 49%">
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
    <form class="user" method="post"  onsubmit="updateEdadBeforeSubmit()">
    <!-- RENGLON UNO  APELLIDO  Y NOMBRE-->
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
    <label class="control-label">Apellido </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user"  id="apellido" name="Apellido"  >
    </div>
    <div class="col-sm-6">
    <label class="control-label">Nombre </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" id="nombre" name="Nombre" style="width: 49%">
    </div> 
    </div>
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Email </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" id="email"name="Email"pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
    </div>  
    <div class="col-sm-6 "><label class="control-label">Sexo </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <div class="form-check">
    <label class="form-check-label">
    <input class="form-check-input" type="radio" name='Sexo' id='sexoM'value="Masculino" 
    <?php echo(!empty($_POST['Sexo']) && $_POST['Sexo']==1) ? 'Checked': ' '; ?>>Masculino </label> </div>
    <div class="form-check">
    <label class="form-check-label">
    <input class="form-check-input" type="radio" name='Sexo' id='sexoF'value="Femenino" 
    <?php echo(!empty($_POST['Sexo']) && $_POST['Sexo']==2) ? 'Checked': ' '; ?> >Femenino </label> </div>
    <div class="form-check">
    <label class="form-check-label">
    <input class="form-check-input" type="radio" name='Sexo' id='sexoX' value="X" 
    <?php echo(!empty($_POST['Sexo']) && $_POST['Sexo']==3) ? 'Checked': ' '; ?> >X </label> </div>
    </div></div>
    <!-- RENGLON CUATRO EDAD Y FECHA NAC -->
    <div class="form-group row">
    <div class="col-sm-6 "><label class="control-label">Fecha de Nacimiento </label>       <i class="fa fa-asterisk" aria-hidden="true"></i>
       <input type="date" id="fechaNacimiento" class="form-control form-control-user" name="FechaNacimiento" >
    </div>




    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Edad </label> 
   <h3 id="edad" name='Edad'> </h3> 
   <input type="hidden" name="Edad" id="inputEdad"> 
    </div>  

    </div>
    <!-- RENGLON DOS  TIPO Y  NUMERO  DNI-->
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Tipo DNI </label>
    <select name="TipoDNI" class="form-control form-control-user" id="tipoDNI">
    <option value="" >Selecciona...</option>
    <?php for($i=0;$i<$CantidadTipoDni;$i++) {
    if(!empty($_POST['TipoDNI'])&& $_POST['TipoDNI']==  $ListadoTipoDni[$i]['ID']){
    $selected='selected';}
    else{
    $selected='';} ?>
    <option value="<?php echo $ListadoTipoDni[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoTipoDni[$i]['DENOMINACION'];  ?></option>
    <?php } ?>
    </select> 
    </div>
    <div class="col-sm-6">
    <label class="control-label">Numero DNI </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" name="NumeroDni" id="numeroDni" pattern="[0-9]{8}" minlength="8" maxlength="8">
    </div>
    </div>
    <!-- RENGLON TRES  VENCIMIENTO DNI Y CUIL -->
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Vencimiento DNI </label>
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="date" id="fechaVencimiento" class="form-control form-control-user" name="FechaVencimiento"  >
    </div>
    <div class="col-sm-6">
    <label class="control-label">Cuil</label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" name="Cuil" id="cuil" pattern="[0-9]{11}" minlength="11" maxlength="11" >
    </div>
    </div>
<!-- RENGLON seis  TIPO Y NUMERO TELEFONO-->
    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Tipo Telefono </label>
    <select name="TipoTel" class="form-control form-control-user" id="tipoTel">
    <option value="" >Selecciona...</option>
    <?php for($i=0;$i<$CantidadTipoTel;$i++) {
    if(!empty($_POST['TipoTel'])&& $_POST['TipoTel']==  $ListadoTipoTel[$i]['ID']){
    $selected='selected';}
    else{
    $selected='';}  ?>
    <option value="<?php echo $ListadoTipoTel[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoTipoTel[$i]['TIPOTEL'];  ?></option>
    <?php } ?>
    </select> 
    </div>
    <div class="col-sm-6"><label class="control-label">Numero de Telefono </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" name="NumeroTel"id="numeroTel">
    </div>
    </div>
    <!-- RENGLON cinco sexo Y domicilio -->
    <div class="form-group row">   
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Calle </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" id="calle" name="Calle">
    </div>
    <div class="col-sm-6 "><label class="control-label">Numero </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <input type="text" class="form-control form-control-user" id="numero" name="Numero">
    </div> 
    </div>
    <!-- RENGLON cinco sexo Y domicilio -->
    <div class="form-group row">   
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Departamento </label> 
    <input type="text" class="form-control form-control-user" id="departamento" name="Departamento">
    </div>
    <div class="col-sm-6 "><label class="control-label">Piso </label> 
    <input type="text" class="form-control form-control-user" id="piso" name="Piso">
    </div> 
    </div>
    <!-- RENGLON cinco sexo Y domicilio -->
    <div class="form-group row">   
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Barrio </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <select name="Barrio" class="form-control form-control-user" id="barrio">
    <option value="" >Selecciona...</option>
    <?php for($i=0;$i<$CantidadBarrio;$i++) {
    if(!empty($_POST['Barrio'])&& $_POST['Barrio']==  $ListadoTipoTel[$i]['ID']){
    $selected='selected';}
    else{
    $selected='';}  ?>
    <option value="<?php echo $ListadoBarrio[$i]['BARRIO'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoBarrio[$i]['BARRIO'];  ?></option>
    <?php } ?>
    </select> 
    </div>
    <div class="col-sm-6 "><label class="control-label">Localidad </label> 
    <i class="fa fa-asterisk" aria-hidden="true"></i>
    <select name="Localidad" class="form-control form-control-user" id="localidad">
    <option value="" >Selecciona...</option>
    <?php for($i=0;$i<$CantidadLocalidad;$i++) {
    if(!empty($_POST['Localidad'])&& $_POST['Localidad']==  $ListadoLocalidad[$i]['ID']){$selected='selected';}
    else{ $selected=''; }    ?>
    <option value="<?php echo $ListadoLocalidad[$i]['LOCALIDAD'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoLocalidad[$i]['LOCALIDAD'];  ?></option>
    <?php } ?>
    </select> 
    </div>
    </div>
    <!-- RENGLON cinco sexo Y domicilio -->
    <div class="form-group row">   
    <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Provincia </label> 
    <input type="text" class="form-control form-control-user" id="provincia" name="Provincia">
    </div>
    <div class="col-sm-6 "><label class="control-label">Pais</label> 
    <input type="text" class="form-control form-control-user" id="pais" name="Pais">
    </div>
    </div>
    <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargadocentes.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="js/edad.js"></script>
  <script>
    function updateEdadBeforeSubmit() {
        // Get the value from the <h3> element
        var edadValue = document.getElementById("edad").innerText;

        // Set the value in the hidden input
        document.getElementById("inputEdad").value = edadValue;
    }
  </script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
<script>
    $(document).ready(function () {
        $('#fechaVencimiento').change(function () {
            var selectedDate = new Date($(this).val());
            var currentDate = new Date();
            // Compare selected date with current date
            if (selectedDate < currentDate) {
                // Set background color to red
                $(this).css('background-color', '#C12E71');
                $(this).css('color', 'white');
            } else {
                // Reset background color
                $(this).css('background-color', '');
                 $(this).css('color', '');
            }
        });
    });
</script>
 <!-- Page specific javascripts-->
</body>
</html>