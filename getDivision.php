<?php 
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once "../Sneaker.php";

$CursosSneaker = new Sneaker();
$Db = new $MiConexion();
$IdCurso=$_POST['IdCurso'];

$cursos = $CursosSneaker->getDivision($IdCurso);

$cadena="<label class="control-label">Division </label> 
<i class="fa fa-asterisk" aria-hidden="true"></i>
<select name="IdDivision" class="form-control form-control-user" id="idDivision">";

$cadena.='<option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadDivision;$i++) {
if(!empty($_POST['IdDivision'])&& $_POST['IdDivision']==  $ListadoDivision[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoDivision[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoDivision[$i]['DENOMINACION'];  ?></option>
<?php } ?>';

//foreach($cursos as $cw){
  //  $cadena.='<option value='.$cw['I'].'>'.$cw['Division'].'</option>';

//}
	echo  $cadena."</select>";
	

?>