<?php
function Validar_Conceptos() {
    $vMensaje='';
    
      
   
    if(empty($_POST['Docentes'])) {
        $vMensaje.='Debes seleccionar una  opcion. <br />';
    }
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>