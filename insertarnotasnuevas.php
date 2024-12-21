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

$variable=$_GET['id'];
$notas="SELECT distinct alum.Id as ID, alum.Nombre, alum.Apellido, alum.IdCurso, alum.IdDivision, alum.IdTurno

FROM alumnos alum
          WHERE alum.Id = '$variable'
         
          ORDER BY alum.Id";

require_once 'funciones/cargarnotasnuevas.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {

  if(InsertarNotasNuevas($MiConexion)!= false) {
    $Mensaje= 'Notas cargadas!';
    $_POST= array();
   $Estilo='success';
}}
 require_once 'header.inc.php'; 
 ?>
</head>
<style>
    .fixed-column {
        position: sticky;
        left: 0;
        background-color: white;
        z-index: 1;
    }
    .fixed-header {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 2;
    }
    #table-container {
    overflow-x: auto;
    max-height: 500px; /* Ajusta según sea necesario */
}
</style>
  <body class="app sidebar-mini">
    <?php require_once 'menu.inc.php'; ?>
    <?php require_once 'user.inc.php'; ?>
      </header>
     <?php require_once 'slideralumnos.inc.php'; ?>
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
                <form class="user" method="post" >
                <div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Materia</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Materias" class="form-control form-control-user" id="materias">
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
</select> 
</div> 
</div>

<div class="form-group row">
<div class="col-sm-6">
<label class="control-label">Curso </label> <i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Curso" class="form-control form-control-user" id="curso">
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
</div>


<HR></HR>






<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Modifica Notas </h3>
            <div class="table-responsive">
             
             <table class="table">
              <thead >
    <tr >
     
    <th>Alumno</th>
    <th>E1</th><th>R1</th><th>R2</th>
    <th>E2</th><th>R1</th><th>R2</th>
    <th>E3</th><th>R1</th><th>R2</th>
     <th>E4</th><th>R1</th><th>R2</th> 
     <th>E5</th><th>R1</th><th>R2</th>
    <th>E6</th><th>R1</th><th>R2</th>
     <th>E7</th><th>R1</th><th>R2</th>
    <th>E8</th><th>R1</th> <th>R2</th> 
     <th>J1</th><th>R1</th><th>J2</th>
     <th>R1</th><th>D</th><th>F</th>
                  </tr>
              
<tbody >
 <?php
                $resultado=mysqli_query($MiConexion, $notas); 
               while($row=mysqli_fetch_assoc($resultado))
                { ?>
             
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['ID']; ?>">

<td> <input type="text" style="border:0 " name="nombre" value="<?php echo $row['Apellido']; ?><?php echo $row['Nombre']; ?>"></td>

<td ><select name="Eval1Nota"  id="eval1Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval1Nota"]) && $_POST["Eval1Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval1Recup1"  id="eval1Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval1Recup1"]) && $_POST["Eval1Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval1Recup2"  id="eval1Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval1Recup2"]) && $_POST["Eval1Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval2Nota"  id="eval2Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval2Nota"]) && $_POST["Eval2Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval2Recup1"  id="eval2Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval2Recup1"]) && $_POST["Eval2Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval2Recup2"  id="eval2Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval2Recup2"]) && $_POST["Eval2Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval3Nota"  id="eval3Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval3Nota"]) && $_POST["Eval3Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval3Recup1"  id="eval3Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval3Recup1"]) && $_POST["Eval3Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval3Recup2"  id="eval3Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval3Recup2"]) && $_POST["Eval3Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval4Nota"  id="eval4Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval4Nota"]) && $_POST["Eval4Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval4Recup1"  id="eval4Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval4Recup1"]) && $_POST["Eval4Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval4Recup2"  id="eval4Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval4Recup2"]) && $_POST["Eval4Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval5Nota"  id="eval5Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval5Nota"]) && $_POST["Eval5Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval5Recup1"  id="eval5Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval5Recup1"]) && $_POST["Eval5Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval5Recup2"  id="eval5Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval5Recup2"]) && $_POST["Eval5Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval6Nota"  id="eval6Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval6Nota"]) && $_POST["Eval6Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval6Recup1"  id="eval6Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval6Recup1"]) && $_POST["Eval6Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval6Recup2"  id="eval6Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval6Recup2"]) && $_POST["Eval6Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval7Nota"  id="eval7Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval7Nota"]) && $_POST["Eval7Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval7Recup1"  id="eval7Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval7Recup1"]) && $_POST["Eval7Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval7Recup2"  id="eval7Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval7Recup2"]) && $_POST["Eval7Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Eval8Nota"  id="eval8Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval8Nota"]) && $_POST["Eval8Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval8Recup1"  id="eval8Recup1" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval8Recup1"]) && $_POST["Eval8Recup1"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Eval8Recup2"  id="eval8Recup2" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Eval8Recup2"]) && $_POST["Eval8Recup2"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>


<td ><select name="Jis1Nota"  id="jis1Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Jis1Nota"]) && $_POST["Jis1Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Jis1Recup"  id="jis1Recup" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Jis1Recup"]) && $_POST["Jis1Recup"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="Jis2Nota"  id="jis2Nota" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Jis2Nota"]) && $_POST["Jis2Nota"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="Jis2Recup"  id="jis2Recup" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["Jis2Recup"]) && $_POST["Jis2Recup"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>

<td ><select name="ColoqDiciembre"  id="coloqDiciembre" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["ColoqDiciembre"]) && $_POST["ColoqDiciembre"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
<td ><select name="ColoqFebrero"  id="coloqFebrero" onchange="colorChange(this)"><option value=""></option>
<?php for ($i = 0; $i < $CantidadNotas; $i++) { if(!empty($_POST["ColoqFebrero"]) && $_POST["ColoqFebrero"] == $ListadoNotas[$i]["ID"]){
          $selected = 'selected'; } else { $selected = ''; } ?>
<option value="<?php echo $ListadoNotas[$i]["NOTA"]; ?>"<?php echo $selected; ?>><?php echo  $ListadoNotas[$i]["NOTA"]; ?></option>
<?php } ?></select></td>
</tr>
<tr >
 
                  </tr>
                </thead>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      

       
<div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</button>
 <a class="btn btn-secondary" href="listadonotas.php"></i>Volver</a>
            </div>
            </div>
            </form>
          </div>
        </div>
        </div>
    </main>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
  
<script> function colorChange(e){
  let div = e.parentNode;
  switch(e.value){
  case '10':div.style.backgroundColor = "#52BE80";break;
  case '9':div.style.backgroundColor = "#52BE80";break;
  case '8':div.style.backgroundColor = "#52BE80"; break;
  case '7':div.style.backgroundColor = "#52BE80";break;
  case '6':div.style.backgroundColor = "#CD6155";break;
  case '5':div.style.backgroundColor = "#CD6155";break;
  case '4':div.style.backgroundColor = "#CD6155";break;
  case '3':div.style.backgroundColor = "#CD6155";break;
  case '2':div.style.backgroundColor = "#CD6155";break;
  case '1':div.style.backgroundColor = "#CD6155";break;
  default:div.style.backgroundColor = "";break;
  }}
</script>
 
     </body>
</html>