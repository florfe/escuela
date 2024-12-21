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
$notas="SELECT alum.Id, alum.Nombre, alum.Apellido, 
nts.Id as ID, nts.IdAlumnos, nts.Materias,  nts.Curso, 
nts.Eval1Nota, nts.Eval1Recup1, nts.Eval1Recup2,
nts.Eval2Nota, nts.Eval2Recup1, nts.Eval2Recup2,
nts.Eval3Nota, nts.Eval3Recup1, nts.Eval3Recup2,
nts.Eval4Nota, nts.Eval4Recup1, nts.Eval4Recup2,
nts.Eval5Nota, nts.Eval5Recup1, nts.Eval5Recup2,
nts.Eval6Nota, nts.Eval6Recup1, nts.Eval6Recup2,
nts.Eval7Nota, nts.Eval7Recup1, nts.Eval7Recup2,
nts.Eval8Nota, nts.Eval8Recup1, nts.Eval8Recup2,
nts.Jis1Nota, nts.Jis1Recup, nts.ColoqDiciembre,
nts.Jis2Nota, nts.Jis2Recup, nts.ColoqFebrero
FROM alumnos alum, notas nts
          WHERE alum.Id = nts.IdAlumnos
          AND nts.Id = '$variable'
         
          ORDER BY alum.Id";

require_once 'funciones/actualizarnotas.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {

  if(ActualizarNotas($MiConexion)!= false) {
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
                
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Modifica Notas </h3>
            <div class="table-responsive">
             
             <table class="table">
              <thead >
    <tr >
     
    <th >Alumno</th>
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
                 <h4> Materia:<?php echo $row['Materias']; ?></h4>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['ID']; ?>">

<td> <input type="text" style="border:0 " name="nombre" value="<?php echo $row['Apellido']; ?><?php echo $row['Nombre']; ?>"></td>

<td><input type="text" style="border:0; width: 20px;" name="eval1Nota" value="<?php echo $row['Eval1Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval1Recup1" value="<?php echo $row['Eval1Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval1Recup2" value="<?php echo $row['Eval1Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval2Nota" value="<?php echo $row['Eval2Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval2Recup1" value="<?php echo $row['Eval2Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval2Recup2" value="<?php echo $row['Eval2Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval3Nota" value="<?php echo $row['Eval3Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval3Recup1" value="<?php echo $row['Eval3Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval3Recup2" value="<?php echo $row['Eval3Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval4Nota" value="<?php echo $row['Eval4Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval4Recup1" value="<?php echo $row['Eval4Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval4Recup2" value="<?php echo $row['Eval4Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval5Nota" value="<?php echo $row['Eval5Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval5Recup1" value="<?php echo $row['Eval5Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval5Recup2" value="<?php echo $row['Eval5Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval6Nota" value="<?php echo $row['Eval6Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval6Recup1" value="<?php echo $row['Eval6Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval6Recup2" value="<?php echo $row['Eval6Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval7Nota" value="<?php echo $row['Eval7Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval7Recup1" value="<?php echo $row['Eval7Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval7Recup2" value="<?php echo $row['Eval7Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="eval8Nota" value="<?php echo $row['Eval8Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="eval8Recup1" value="<?php echo $row['Eval8Recup1']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="eval8Recup2" value="<?php echo $row['Eval8Recup2']; ?>"></td>
<td><input type="text" style="border:0; width: 20px;" name="jis1Nota" value="<?php echo $row['Jis1Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="jis1Recup" value="<?php echo $row['Jis1Recup']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;" name="jis2Nota" value="<?php echo $row['Jis2Nota']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="jis2Recup" value="<?php echo $row['Jis2Recup']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="coloqDiciembre" value="<?php echo $row['ColoqDiciembre']; ?>"></td>
<td> <input type="text" style="border:0; width: 20px;"  name="coloqFebrero" value="<?php echo $row['ColoqFebrero']; ?>"></td>
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