<?php 
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once "../Sneaker.php";

$CiclosSneaker = new Sneaker();
$Db = new $MiConexion();
$Ciclos=$_POST['Ciclos'];

$ciclos = $CiclosSneaker->getDivision($Ciclos);

$cadena="<label class="control-label">Curso </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="Curso" class="form-control form-control-user" id="curso">
<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCurso;$i++) {
if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoCurso[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso[$i]['DENOMINACION'];  ?></option>



  echo  $cadena."</select>";

?>