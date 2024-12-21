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

require_once 'funciones/validar_datosacademal.php'; 
require_once 'funciones/insertar_documentacionalumnos.php';


$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
$Mensaje= Validar_DatosLaboral();


if(empty($Mensaje)){
  if(InsertarDocumentacion($MiConexion)!= false ) {
    $Mensaje= 'Datos cargados!';
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
          <h1><i class="fa fa-edit"></i> Registrar Documentación</h1>
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
            <h3 class="tile-title">Ingresa documentación entregada<img  src= "icon/woman-checks-it-off-her-list-m-unscreen.gif" style="width:20%; float: right" /></h3>
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

                <!-- RENGLON UNO  -->
                <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
<label class="control-label">Alumno </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Alumnos" class="form-control form-control-user" id="alumnos">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadAlumnos;$i++) {
if(!empty($_POST['Alumnos'])&& $_POST['Alumnos']==  $ListadoAlumnos[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoAlumnos[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoAlumnos[$i]['APELLIDO'], $ListadoAlumnos[$i]['NOMBRE'];  ?></option>
<?php } ?>
</select> 
                    </div>
                    </div>
                 <div class="form-group row">   
                        <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">Documentación </label> 
                        </div ></div>
                       <div class="form-group row">   
                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                     <div class="form-check">     
<label class="form-check-label">
  <input name="checkbox1" value="0" type="hidden">
<input class="form-check-input"type="checkbox"  name='checkbox1' value='Fotocopia DNI actualizado '<?php echo(!empty($_POST['checkbox1']) && $_POST['checkbox1']==1) ? 'Checked': ' '; ?>>Fotocopia DNI actualizado </label></div>
                          <div class="form-check">
<label class="form-check-label">
  <input name="checkbox2" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox2'value='Fotocopia  DNI  actualizado Tutor'<?php echo(!empty($_POST['checkbox2']) && $_POST['checkbox2']==2) ? 'Checked': ' '; ?>>Fotocopia  DNI  actualizado Tutor</label> </div>



                            <div class="form-check">
<label class="form-check-label">
  <input name="checkbox3" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox3'value='Partida de  Nacimiento'<?php echo(!empty($_POST['checkbox3']) && $_POST['checkbox3']==3) ? 'Checked': ' '; ?> >Partida de  Nacimiento </label> </div>
                             
               <div class="form-check">
<label class="form-check-label">
  <input name="checkbox4" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox4' value='Copia  carnet de Vacunas'<?php echo(!empty($_POST['checkbox4']) && $_POST['checkbox4']==4) ? 'Checked': ' '; ?>>Copia  carnet de Vacunas </label> </div>
                             

 
                        <div class="form-check">
<label class="form-check-label">
  <input name="checkbox5" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox5'value='Constancia de CUIL'<?php echo(!empty($_POST['checkbox5']) && $_POST['checkbox5']==5) ? 'Checked': ' '; ?> >Constancia de CUIL </label> </div>
                          <div class="form-check">
<label class="form-check-label">
  <input name="checkbox6" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox6' value='Constancia de  CUIL  Tutor '<?php echo(!empty($_POST['checkbox6']) && $_POST['checkbox6']==6) ? 'Checked': ' '; ?>>Constancia de  CUIL  Tutor </label> </div></div>
<div class="col-sm-6">


                            <div class="form-check">
<label class="form-check-label">
  <input name="checkbox7" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox7'value='Ficha Médica '<?php echo(!empty($_POST['checkbox7']) && $_POST['checkbox7']==7) ? 'Checked': ' '; ?> >Ficha Médica </label> </div>

                          
                              <div class="form-check">
<label class="form-check-label">
  <input name="checkbox8" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox8' value='Certificado de Sexto Grado'<?php echo(!empty($_POST['checkbox8']) && $_POST['checkbox8']==8) ? 'Checked': ' '; ?>>Certificado de Sexto Grado </label> </div>
                              


                              <div class="form-check">
<label class="form-check-label">
  <input name="checkbox9" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox9' value='Constancia de Documentos'<?php echo(!empty($_POST['checkbox9']) && $_POST['checkbox9']==9) ? 'Checked': ' '; ?>>Constancia de Documentos</label> </div>
                              
                              <div class="form-check">
<label class="form-check-label">
  <input name="checkbox10" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox10' value='Pase Provisorio'<?php echo(!empty($_POST['checkbox10']) && $_POST['checkbox10']==10) ? 'Checked': ' '; ?>>Pase Provisorio </label> </div>
                              


                              <div class="form-check">
<label class="form-check-label">
  <input name="checkbox11" value="0" type="hidden">
<input class="form-check-input" type="checkbox" name='checkbox11' value='Pase Definitivo'<?php echo(!empty($_POST['checkbox11']) && $_POST['checkbox11']==11) ? 'Checked': ' '; ?>>Pase Definitivo</label> </div>
                              </div>  
                    </div> 
 <!-- RENGLON DOS  -->
            

                               
                               
                          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="cargaalumnos3.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
    <!-- Page specific javascripts-->
     </body>
</html>