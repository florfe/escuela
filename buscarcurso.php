<?php
require_once 'funciones/listar_curso.php'; 
$ListadoCurso=Listar_Curso($MiConexion);
$CantidadCurso=count($ListadoCurso);
$html = "";
if ($_POST["cicloelegido"]=="Basico") {
    $html = '
    <option value="Basico" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCurso;$i++) {
if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoCurso[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso[$i]['DENOMINACION'];  ?></option>
<?php } ?>'
    ;  
}
if ($_POST["cicloelegido"]=="Orientado") {
    $html = '
   <option value="" >Selecciona...</option>
<?php for($i=0;$i<$CantidadCurso;$i++) {
if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso[$i]['ID']){
  $selected='selected';}
  else{
    $selected='';
 }
    ?>
<option value="<?php echo $ListadoCurso[$i]['DENOMINACION'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso[$i]['DENOMINACION'];  ?></option>
<?php } ?>
    ';  
}

echo $html; 
?>