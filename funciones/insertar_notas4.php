

<?php
function InsertarColqDic($vConexion) {
   $variable=$_GET['id'];
   if (!empty($_POST['BotonRegistrar'])) {
   	foreach ($_POST['Materia'] as $index => $materia) {
   		$colDiciembre = $_POST['ColoquioDiciembre'][$index];
 $SQL_Insert = "INSERT INTO notasfinal (IdAlumnos, Materias, ColoqDiciembre)
    VALUES ('" . $variable . "', '" . $materia . "', '" . $colDiciembre . "')";
    
    if (!mysqli_query($vConexion, $SQL_Insert)) {
//si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar el registro: ' . mysqli_error($vConexion) . '</h4>');
    }
    return true;
}}
return false;
}
?>
