<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$variable=$_GET['id'];
$alumnos="SELECT doc.Id, doc.Nombre, doc.Apellido, doc.IdTipoDni  as TipoDni, doc.NumeroDni, doc.VencimientoDni, doc.Cuil, doc.IdTelefono as TipoTel, doc.NumeroTel, doc.Email, doc.FechaNacimiento, doc.Edad,  doc.IdSexo as Sexo, doc.Calle, doc.Numero, doc.Departamento, doc.Piso, doc.Barrio, doc.Localidad, doc.Provincia, doc.Pais, doc.FechaIngreso, doc.IdSituacion as Estado, doc.Legajo
        FROM alumnos doc
        WHERE doc.Id='$variable'";



require_once 'funciones/actualizaralumnos.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(ActualizarAlumnos($MiConexion)!= false) {
    $Mensaje= 'Alumno actualizado!';
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
          <h1><i class="fa fa-th-list"></i> Actualizar</h1>
         
          <p>Actualizar Alumnos</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Actualizar Alumnos</a></li>
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
                <th>TipoDni</th>
                <th>Dni</th>
                <th>VencimientoDni</th>
                <th>Cuil</th>
                
                </tr>

                 <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $alumnos); 
                while($row=mysqli_fetch_assoc($resultado))
                { ?>
                <tr>
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                <td> <input type="text" style="border:0" name="nombre" value="<?php echo $row['Nombre']; ?>"></td>
                <td> <input type="text" style="border:0" name="apellido" value="<?php echo $row['Apellido']; ?>"></td>
                <td><input type="text" style="border:0" name="tipoDni" value="<?php echo $row['TipoDni']; ?>"></td>
                <td><input type="text" style="border:0" name="numeroDni" value="<?php echo $row['NumeroDni']; ?>"></td>
                <td><input type="text" style="border:0" name="vencimientoDni" value="<?php echo $row['VencimientoDni']; ?>"></td>
                <td> <input type="text" style="border:0"  name="cuil" value="<?php echo $row['Cuil']; ?>"></td>
               

                </tr>
             
                    <tr style='background-color:#36A0D6; color:#ffff'>
                      <th>TipoTel</th>
                <th>NumeroTel</th>
                <th>Email</th>
                <th>FechaNacimiento</th>
                <th>Edad</th>
                <th>Sexo</th>

                
                    </tr>
                    <tr> 
                      <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                       <td><input type="text" style="border:0" name="tipoTel" value="<?php echo $row['TipoTel']; ?>"></td>
                <td><input type="text" style="border:0" name="numeroTel" value="<?php echo $row['NumeroTel']; ?>"></td>
                <td><input type="text" style="border:0" name="email" value="<?php echo $row['Email']; ?>"></td>
                <td> <input type="text" style="border:0" name="fechaNacimiento" value="<?php echo $row['FechaNacimiento']; ?>"></td>
                <td> <input type="text" style="border:0" name="edad" value="<?php echo $row['Edad']; ?>"></td>
                      <td> <input type="text" style="border:0" name="sexo" value="<?php echo $row['Sexo']; ?>"></td>

                   
                    </tr>
                 
                 <tr style='background-color:#36A0D6; color:#ffff'>
                  <th>Calle</th>
                <th>Numero</th>
                <th>Departamento</th>
                <th>Piso</th>
                <th>Barrio</th>
                <th>Localidad</th>
               
                  </tr>
                  <tr > 
                 <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                    <td><input type="text" style="border:0" name="calle" value="<?php echo $row['Calle']; ?>"></td>
                    <td> <input type="text" style="border:0"  name="numero" value="<?php echo $row['Numero']; ?>"></td>
                    <td> <input type="text" style="border:0" name="departamento" value="<?php echo $row['Departamento']; ?>"></td>
                  <td> <input type="text" style="border:0" name="piso" value="<?php echo $row['Piso']; ?>"></td>
                  <td> <input type="text" style="border:0" name="barrio" value="<?php echo $row['Barrio']; ?>"></td>
                  <td><input type="text" style="border:0" name="localidad" value="<?php echo $row['Localidad']; ?>"></td>
                  </tr>
                  
              <tr style='background-color:#36A0D6; color:#ffff'>
               <th>Provincia</th>
                <th>Pais</th>
                <th>FechaIngreso</th>
                <th>Estado</th>
                <th>Legajo</th>
           
               </tr>
               <tr > 
               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
              <td> <input type="text" style="border:0"  name="provincia" value="<?php echo $row['Provincia']; ?>"></td>
                  <td> <input type="text" style="border:0" name="pais" value="<?php echo $row['Pais']; ?>"></td>
                   <td><input type="text" style="border:0" name="fechaIngreso" value="<?php echo $row['FechaIngreso']; ?>"></td>
                <td> <input type="text" style="border:0" name="estado" value="<?php echo $row['Estado']; ?>"></td>
               <td> <input type="text" style="border:0" name="legajo" value="<?php echo $row['Legajo']; ?>"></td>
                 </tr>
                                <tr >
                  <td> <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar">Guardar</td>
                    <td>  <a class="btn btn-secondary" href="listadoalumnos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Volver</a></td>
                  </tr>

                </thead>
                <?php } ?>
                </tbody>
              </table>
            </div><img  src= "icon/figures-go-huddle-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right:8%" />
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