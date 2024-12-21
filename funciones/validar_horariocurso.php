<?php
function Validar_Horario() {
    $vMensaje='';
    
      
    
    if(empty($_POST['Curso'])) {
        $vMensaje.='Debes seleccionar una  opcion de Curso. <br />';
    }
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>