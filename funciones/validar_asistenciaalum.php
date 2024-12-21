<?php
function Validar_Asistencia() {
    $vMensaje='';
  if (!isset($_POST['Fecha'])) {
       if (is_array($_POST['Fecha'])) {
  foreach ($_POST['Fecha'] as &$fecha) {
  $fecha = trim($fecha);
            }
        } 
            


$vMensaje .= 'La fecha es requerida.<br>';
    
    }
    return $vMensaje;
}
?>
 