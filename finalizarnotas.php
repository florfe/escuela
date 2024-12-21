<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/listar_evaluacion.php'; 
$ListadoNotas=Listar_Notas($MiConexion);
$CantidadNotas=count($ListadoNotas);
require_once 'funciones/insertar_notas4.php';


$alumnos = "SELECT al.Id as ID, al.Nombre, al.Apellido,
cc.Id, cc.Curso, cc.Division, cc.Turno,
pri.IdAlumnos, pri.Materias as Materia, pri.Curso as CC,  
pri.Eval1Nota, pri.Eval1Recup1, pri.Eval1Recup2,
pri.Eval2Nota, pri.Eval2Recup1, pri.Eval2Recup2,
pri.Eval3Nota, pri.Eval3Recup1, pri.Eval3Recup2,
pri.Eval4Nota, pri.Eval4Recup1, pri.Eval4Recup2,
pri.Jis1Nota, pri.Jis1Recup, 
seg.IdAlumnos, seg.Materias, seg.Curso as CC,
seg.Eval5Nota, seg.Eval5Recup1, seg.Eval5Recup2,
seg.Eval6Nota, seg.Eval6Recup1, seg.Eval6Recup2,
seg.Eval7Nota, seg.Eval7Recup1, seg.Eval7Recup2,
seg.Eval8Nota, seg.Eval8Recup1, seg.Eval8Recup2,
seg.Jis2Nota, seg.Jis2Recup

FROM alumnos al, notas pri, notassegunda seg, cursoscompletos cc
            WHERE al.Id = pri.IdAlumnos AND al.Id = seg.IdAlumnos AND pri.Materias = seg.Materias
            AND cc.Id = pri.Curso AND cc.Id = seg.Curso and al.Id='$variable' AND pri.Materias = '$materia'
            
          ";



$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(InsertarColqDic($MiConexion)!= false) {
    $Mensaje= 'Coloquio cargado!';
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
          <h1><i class="fa fa-th-list"></i>Coloquios Diciembre</h1>
         
          <p>Coloquios Diciembre</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Coloquios Diciembre</a></li>
          </ul>
      </div>
       <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                    <?php echo $Mensaje; ?> 
                                </div>
                            <?php } ?>
              </div>
      <form action="" method="post">
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            
            <div class="table-responsive">
              <table class="table">
               
                <thead>
                  <tr>
                   <th>Alumno</th>
                   <th>Curso</th>
                   <!--<th>Division</th>
                   <th>Turno</th>-->
                    <th>Materia</th>
                    <th>N1</th>
                    <th>R1</th>
                    <th>R2</th>
                      <th>N2</th>
                      <th>R1</th>
                      <th>R2</th>
                        <th>N3</th>
                        <th>R1</th>
                        <th>R2</th>
                          <th>N4</th>
                          <th>R1</th>
                          <th>R2</th>
                            


                    <th>N5</th>
                    <th>R1</th>
                    <th>R2</th>
                      <th>N6</th>
                      <th>R1</th>
                      <th>R2</th>
                        <th>N7</th>
                        <th>R1</th>
                        <th>R2</th>
                          <th>N8</th>
                          <th>R1</th>
                          <th>R2</th>
                          <th>J1</th>
                            <th>R1</th>
                            <th>J2</th>
                            <th>R1</th>
                    <th>ColoqDic</th>
                  </tr>
</thead>
<tbody >
<?php
$resultado=mysqli_query($MiConexion, $alumnos); 
while($row=mysqli_fetch_assoc($resultado))
{ ?><h3> </h3>
  <tr > 
  <td><?php echo $row['Apellido']; ?><?php echo $row['Nombre']; ?></td>
  <td><?php echo $row['Curso']; ?><?php echo $row['Division']; ?><?php echo $row['Turno']; ?></td>
  
  <td><input type="hidden" name="Materia[]" value="<?php echo $row['Materia']; ?>"><?php echo $row['Materia']; ?></td>
    <td ><?php echo $row['Eval1Nota']; ?></td>
    <td><?php echo $row['Eval1Recup1']; ?></td>
    <td <?php if (!empty($row['Eval1Recup2']) && $row['Eval1Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval1Recup2']; ?></td>
      <td><?php echo $row['Eval2Nota']; ?></td>
      <td><?php echo $row['Eval2Recup1']; ?></td>
       <td <?php if (!empty($row['Eval2Recup2']) && $row['Eval2Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval2Recup2']; ?></td>
        <td><?php echo $row['Eval3Nota']; ?></td>
        <td><?php echo $row['Eval3Recup1']; ?></td>
         <td <?php if (!empty($row['Eval3Recup2']) && $row['Eval3Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval3Recup2']; ?></td>
          <td><?php echo $row['Eval4Nota']; ?></td>
          <td><?php echo $row['Eval4Recup1']; ?></td>
          <td <?php if (!empty($row['Eval4Recup2']) && $row['Eval4Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval4Recup2']; ?></td>
            
    <td><?php echo $row['Eval5Nota']; ?></td>
    <td><?php echo $row['Eval5Recup1']; ?></td>
    <td <?php if (!empty($row['Eval5Recup2']) && $row['Eval5Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval5Recup2']; ?></td>
      <td><?php echo $row['Eval6Nota']; ?></td>
      <td><?php echo $row['Eval6Recup1']; ?></td>
       <td <?php if (!empty($row['Eval6Recup2']) && $row['Eval6Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval6Recup2']; ?></td>
        <td><?php echo $row['Eval7Nota']; ?></td>
        <td><?php echo $row['Eval7Recup1']; ?></td>
        <td <?php if (!empty($row['Eval7Recup2']) && $row['Eval7Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval7Recup2']; ?></td>
          <td><?php echo $row['Eval8Nota']; ?></td>
          <td><?php echo $row['Eval8Recup1']; ?></td>
           <td <?php if (!empty($row['Eval8Recup2']) && $row['Eval8Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval8Recup2']; ?></td>
            <td><?php echo $row['Jis1Nota']; ?></td>
            <td <?php if (!empty($row['Jis1Recup']) && $row['Jis1Recup'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Jis1Recup']; ?></td>
            <td><?php echo $row['Jis2Nota']; ?></td>
            <td <?php if (!empty($row['Jis2Recup']) && $row['Jis2Recup'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Jis2Recup']; ?></td>

<td><?php if ((!empty($row['Eval1Recup2']) && $row['Eval1Recup2'] < 7)
|| (!empty($row['Eval2Recup2']) && $row['Eval2Recup2'] < 7)     
|| (!empty($row['Eval3Recup2']) && $row['Eval3Recup2'] < 7)
|| (!empty($row['Eval4Recup2']) && $row['Eval4Recup2'] < 7)
|| (!empty($row['Eval5Recup2']) && $row['Eval5Recup2'] < 7)
|| (!empty($row['Eval6Recup2']) && $row['Eval6Recup2'] < 7)
|| (!empty($row['Eval7Recup2']) && $row['Eval7Recup2'] < 7)
|| (!empty($row['Eval8Recup2']) && $row['Eval8Recup2'] < 7)
|| (!empty($row['Jis1Recup']) && $row['Jis1Recup'] < 7)
|| (!empty($row['Jis2Recup']) && $row['Jis2Recup'] < 7)
){  ?>
<select name="ColoquioDiciembre[]"  id="coloquioDiciembre" onchange="colorChange(this)"><option value=""></option>';
<?php for ($i = 0; $i < $CantidadNotas; $i++) {
  $selected = (!empty($_POST["ColoquioDiciembre"]) && $_POST["ColoquioDiciembre"] == $ListadoNotas[$i]["ID"]) ? 'selected' : '';
 echo'<option value="' . $ListadoNotas[$i]["NOTA"] . '" ' . $selected . '>' . $ListadoNotas[$i]["NOTA"] . '</option>'; }?>
 '</select><?php }?> 
</td>

</tr>
<?php } ?>
<?php $row_cnt = $resultado->num_rows; ?>
<h4> Total: <?php echo ($row_cnt);?></h4>
</tbody>
<tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                  <td>  <a class="btn btn-secondary" href="finalizarnotas.php"></i>Volver</a></td>
                  </tr>
              </table>
            </div><img  src= "icon/71f1bb4cb2e5cce9c2c39de4ee4bd7-unscreen.gif" style="width:15%; position: absolute; right:8%" />
          </div>

         
        </div></form>
        <div class="clearfix"></div>
        
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
  </body>
</html>