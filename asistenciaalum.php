<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
  require_once 'funciones/validar_asistenciaalum.php'; 
require_once 'funciones/insertar_asistenciaalum.php'; 
//require_once 'funciones/insertar_checkbox.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {


if(empty($Mensaje)){
  if(InsertarAsistencia($MiConexion) ) {
    $Mensaje= 'Asistencia cargada!';
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
          <h1><i class="fa fa-th-list"></i>Asistencia</h1>
         
          <p>Asistencia de alumnos</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Asistencia de alumnos</a></li>
          </ul>
      </div>



      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Asistencia de alumnos<img  src= "icon/wheelchair-racer-md-nwm-v2-unscreen.gif" style="width:10%; position: absolute; right: 1%" /></h3>
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

<form class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
   
  <div class="row">
  <div class="col-md-3">
  <button class="btn btn-primary" type="submit" name="BotonCurso1am" value="BotonCurso1am"><i class="fa fa-fw fa-lg fa-check-circle"></i>1º A T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
  <button class="btn btn-primary" type="submit" name="BotonCurso1bm" value="BotonCurso1bm"><i class="fa fa-fw fa-lg fa-check-circle"></i>1º B T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
   <button class="btn btn-primary" type="submit" name="BotonCurso1cm" value="BotonCurso1cm"><i class="fa fa-fw fa-lg fa-check-circle"></i>1º C T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso1at" value="BotonCurso1at"><i class="fa fa-fw fa-lg fa-check-circle"></i>1º A T.TARDE</button>&nbsp;&nbsp;&nbsp;
   </div>
  </div>
<hr></hr>
   <div class="row">
     <div class="col-md-3">
   <button class="btn btn-primary" type="submit" name="BotonCurso2am" value="BotonCurso2am"><i class="fa fa-fw fa-lg fa-check-circle"></i>2º A T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
   </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso2bm" value="BotonCurso2bm"><i class="fa fa-fw fa-lg fa-check-circle"></i>2º B T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso2at" value="BotonCurso2at"><i class="fa fa-fw fa-lg fa-check-circle"></i>2º A T.TARDE</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso2bt" value="BotonCurso2bt"><i class="fa fa-fw fa-lg fa-check-circle"></i>2º B T.TARDE</button>&nbsp;&nbsp;&nbsp;
    </div>
  </div><hr></hr>
   <div class="row">
  <div class="col-md-3">
  <button class="btn btn-primary" type="submit" name="BotonCurso3am" value="BotonCurso3am"><i class="fa fa-fw fa-lg fa-check-circle"></i>3º A T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
   </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso3bm" value="BotonCurso3bm"><i class="fa fa-fw fa-lg fa-check-circle"></i>3º B T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso3at" value="BotonCurso3at"><i class="fa fa-fw fa-lg fa-check-circle"></i>3º A T.TARDE</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso3bt" value="BotonCurso3bt"><i class="fa fa-fw fa-lg fa-check-circle"></i>3º B T.TARDE</button>&nbsp;&nbsp;&nbsp;
   </div>
  </div><hr></hr>
   <div class="row">
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso4hm" value="BotonCurso4hm"><i class="fa fa-fw fa-lg fa-check-circle"></i>4º HUMANIDADES T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
    </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso4em" value="BotonCurso4em"><i class="fa fa-fw fa-lg fa-check-circle"></i>4º ECONOMIA T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
   <button class="btn btn-primary" type="submit" name="BotonCurso4et" value="BotonCurso4et"><i class="fa fa-fw fa-lg fa-check-circle"></i>4º ECONOMIA T.TARDE</button>&nbsp;&nbsp;&nbsp;
   </div>
  </div><hr></hr>
   <div class="row">
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso5hm" value="BotonCurso5hm"><i class="fa fa-fw fa-lg fa-check-circle"></i>5º HUMANIDADES T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
   <div class="col-md-3">
   <button class="btn btn-primary" type="submit" name="BotonCurso5em" value="BotonCurso5em"><i class="fa fa-fw fa-lg fa-check-circle"></i>5º ECONOMIA T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
  </div>
  <div class="col-md-3">
   <button class="btn btn-primary" type="submit" name="BotonCurso5et" value="BotonCurso5et"><i class="fa fa-fw fa-lg fa-check-circle"></i>5º ECONOMIA T.TARDE</button>&nbsp;&nbsp;&nbsp;
    </div>
  </div><hr></hr>
   <div class="row">
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso6hm" value="BotonCurso6hm"><i class="fa fa-fw fa-lg fa-check-circle"></i>6º HUMANIDADES T.MAÑANA</button>&nbsp;&nbsp;&nbsp;
    </div>
  <div class="col-md-3">
    <button class="btn btn-primary" type="submit" name="BotonCurso6et" value="BotonCurso6et"><i class="fa fa-fw fa-lg fa-check-circle"></i>6º ECONOMIA T.TARDE</button>&nbsp;&nbsp;&nbsp;
  </div> </div>
        <br></br>
<div class="row"><div class="col-sm-3"><label class="control-label">Fecha </label>
      <i class="fa fa-asterisk" aria-hidden="true"></i>
      <input type="date" id="fecha" class="form-control form-control-user" name="fecha">
      </div></div>
      <br></br>
   
 
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                     <th>Nombre</th>
                    <th>Apellido</th>
                     <th><center>Presente</center></th>
                    <th><center>Falta justificada</center></th>
                  <th><center>Falta injustificada</center></th>
                     <th><center>Llegada tarde</center></th>
                     
                    
                      
                  </tr>
                </thead>
               
                <tbody>
                <?php
 if(!empty($_POST['BotonCurso1am'])){?>
   <h3>1º A TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=1 AND doc.IdDivision='A' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox" checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                 
                  </tr>
              <?php }} ?>
              <?php
if(!empty($_POST['BotonCurso1bm'])){ ?>
   <h3>1º B TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=1 AND doc.IdDivision='B' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
             
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox" name="inasis[]" id="inasis" value="presente" checked/></center></td>
                 <td><center><input type="checkbox" name="inasis[]" id="inasis" value="falta  justificada" /></center></td>
                  <td><center><input type="checkbox"  name="inasis[]" id="inasis" value="falta injustificada"  /></center></td>
                   <td><center><input type="checkbox" name="inasis[]" id="inasis" value="llegada tarde" /></center></td>
                    
                  </tr>
              <?php }} ?>




               <?php
if(!empty($_POST['BotonCurso1cm'])){?>
   <h3>1º C TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=1 AND doc.IdDivision='C' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox" name="inasis[]" id="inasis" value="presente" checked/></center></td>
                 <td><center><input type="checkbox" name="inasis[]" id="inasis" value="falta  justificada" /></center></td>
                  <td><center><input type="checkbox"  name="inasis[]" id="inasis" value="falta injustificada"  /></center></td>
                   <td><center><input type="checkbox" name="inasis[]" id="inasis" value="llegada tarde" /></center></td>
                     <td><?php echo $_POST['fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso1at'])){?>
   <h3>1º A TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=1 AND doc.IdDivision='A' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso2am'])){?>
   <h3>2º A TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=2 AND doc.IdDivision='A' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso2bm'])){?>
   <h3>2º B TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=2 AND doc.IdDivision='B' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                 <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso2at'])){?>
   <h3>2º A TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=2 AND doc.IdDivision='A' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                 <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso2bt'])){?>
   <h3>2º B TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=2 AND doc.IdDivision='B' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>

              <?php
if(!empty($_POST['BotonCurso3am'])){?>
   <h3>3º A TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=3 AND doc.IdDivision='A' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso3bm'])){
  ?>
   <h3>3º B TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=3 AND doc.IdDivision='B' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                 <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso3at'])){
  ?>
   <h3>3º A TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=3 AND doc.IdDivision='A' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso3bt'])){?>
   <h3>3º B TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=3 AND doc.IdDivision='B' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>

              <?php
if(!empty($_POST['BotonCurso4hm'])){?>
   <h3>4º HUMANIDADES TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=4 AND doc.IdDivision='Humanidades' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso4em'])){?>
   <h3>1º ECONOMIA TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=4 AND doc.IdDivision='Economia' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso4et'])){?>
   <h3>4º ECONOMIA TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=4 AND doc.IdDivision='Economia' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso5hm'])){?>
   <h3>5º HUMANIDADES TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=5 AND doc.IdDivision='Humanidades' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>

              <?php
if(!empty($_POST['BotonCurso5em'])){?>
   <h3>5º ECONOMIA TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=5 AND doc.IdDivision='Economia' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                 <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso5et'])){?>
   <h3>5º ECONOMIA TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=5 AND doc.IdDivision='Economia' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso6hm'])){?>
   <h3>6º HUMANIDADES TURNO MAÑANA</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=6 AND doc.IdDivision='Humanidades' AND doc.IdTurno='Mañana'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                  <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>
              <?php }} ?>
               <?php
if(!empty($_POST['BotonCurso6et'])){?>
   <h3>6º ECONOMIA TURNO TARDE</h3>
   <?php
    $SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division
    FROM alumnos doc WHERE doc.IdCurso=6 AND doc.IdDivision='Economia' AND doc.IdTurno='Tarde'";
              $resultado=mysqli_query($MiConexion, $SQL); 
              while($row=mysqli_fetch_assoc($resultado)){
              ?>
                 <tr>  
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                 <td><center><input type="checkbox"   checked/></center></td>
                 <td><center><input type="checkbox"   /></center></td>
                  <td><center><input type="checkbox"    /></center></td>
                   <td><center><input type="checkbox"  /></center></td>
                   <td><?php echo $_POST['Fecha']; ?></td>
                  </tr>  
              <?php }} ?>
                  </tbody>
              </table> 
                 <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="asistenciaalum.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </div>
          </div>
        </div>
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
    
  </body>
</html>