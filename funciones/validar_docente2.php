<?php
function Validar_Docente() {
    $vMensaje='';
  if (empty($_POST['Docentes'])) {
      $vMensaje .= 'Debe seleccionar un Docente.<br>';
    
    }
     foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}
?>
 