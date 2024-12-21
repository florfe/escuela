<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$variable=$_GET['id'];
$docentes="SELECT doc.Id, doc.Nombre, doc.Apellido, doc.NumeroDni, doc.Cuil, doc.FechaNacimiento, 
doc.Edad, doc.NumeroTel, doc.IdSexo as Sexo, doc.Email, doc.Calle, doc.Numero, 
    doc.Departamento, doc.Piso, doc.Barrio, doc.Localidad, doc.Provincia, doc.Pais, 
    doc.Escalafon, doc.Legajo, doc.Titulo, doc.Cargo
FROM docentes doc
WHERE doc.Id = '$variable'
ORDER BY doc.Id
";
require_once 'funciones/actualizar.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(ActualizarDocentes($MiConexion)!= false) {
    $Mensaje= 'Docente actualizado!';
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
  <?php require_once 'slider.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados<img  src= "icon/5B2J-unscreen.gif" style="width:6%; position: absolute; right:20%" /></h1>
                   <p>Listado total de docentes</p>
           </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de docentes</a></li>
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
                <tr style='background-color:#36A0D6; color:#ffff'>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dni</th>
                <th>Cuil</th>
                <th>FechaNacimiento</th>
                <th>Edad</th>
                </tr>
                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $docentes); 
                while($row=mysqli_fetch_assoc($resultado))
                { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                <td> <input type="text" style="border:0" name="nombre" value="<?php echo $row['Nombre']; ?>"></td>
                <td> <input type="text" style="border:0" name="apellido" value="<?php echo $row['Apellido']; ?>"></td>
                <td><input type="text" style="border:0" name="numeroDni" value="<?php echo $row['NumeroDni']; ?>"></td>
                <td> <input type="text" style="border:0"  name="cuil" value="<?php echo $row['Cuil']; ?>"></td>
                <td> <input type="text" style="border:0" name="fechaNacimiento" value="<?php echo $row['FechaNacimiento']; ?>"></td>
                <td> <input type="text" style="border:0" name="edad" value="<?php echo $row['Edad']; ?>"></td>
                </tr>
                                 <tr style='background-color:#36A0D6; color:#ffff'>
                    <th>Telefono</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Calle</th>
                    <th>Numero</th>
                    <th>Departamento</th>
                    </tr>
                    <tr> 
                       <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                    <td> <input type="text" style="border:0" name="numeroTel" value="<?php echo $row['NumeroTel']; ?>"></td>
                    <td> <input type="text" style="border:0" name="sexo" value="<?php echo $row['Sexo']; ?>"></td>
                    <td> <input type="text" style="border:0" name="email" value="<?php echo $row['Email']; ?>"></td>
                    <td><input type="text" style="border:0" name="calle" value="<?php echo $row['Calle']; ?>"></td>
                    <td> <input type="text" style="border:0"  name="numero" value="<?php echo $row['Numero']; ?>"></td>
                    <td> <input type="text" style="border:0" name="departamento" value="<?php echo $row['Departamento']; ?>"></td>
                    </tr>
                                  <tr style='background-color:#36A0D6; color:#ffff'>
                  <th>Piso</th>
                  <th>Barrio</th>
                  <th>Localidad</th>  
                  <th>Provincia</th>
                  <th>Pais</th>
                  <th>Fecha Escalafon</th>
                  </tr>
                  <tr > 
                 <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                  <td> <input type="text" style="border:0" name="piso" value="<?php echo $row['Piso']; ?>"></td>
                  <td> <input type="text" style="border:0" name="barrio" value="<?php echo $row['Barrio']; ?>"></td>
                  <td><input type="text" style="border:0" name="localidad" value="<?php echo $row['Localidad']; ?>"></td>
                  <td> <input type="text" style="border:0"  name="provincia" value="<?php echo $row['Provincia']; ?>"></td>
                  <td> <input type="text" style="border:0" name="pais" value="<?php echo $row['Pais']; ?>"></td>
                  <td> <input type="text" style="border:0" name="escalafon" value="<?php echo $row['Escalafon']; ?>"></td>
                  </tr>
                                <tr style='background-color:#36A0D6; color:#ffff'>
               <th>N° Legajo</th>
               <th>Titulo</th>
               <th>Cargo</th>
                     
               </tr>
               <tr > 
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
               <td> <input type="text" style="border:0" name="legajo" value="<?php echo $row['Legajo']; ?>"></td>
               <td> <input type="text" style="border:0" name="titulo" value="<?php echo $row['Titulo']; ?>"></td>
               <td><input type="text" style="border:0" name="cargo" value="<?php echo $row['Cargo']; ?>"></td>
              
               </tr>
                               
                                  <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                  <td>  <a class="btn btn-secondary" href="listado.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a></td>
                  </tr>

              
                </thead>
                <?php } ?>
                </tbody>

              </table>
             
            </div>
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
      </body>
</html>