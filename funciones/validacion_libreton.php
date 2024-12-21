<?php
function Validar_Datos() {
    $vMensaje='';
   
    if (empty($_POST['Curso'])) {
        $vMensaje.='Debe seleccionar un Curso. <br />';
    }
    if (empty($_POST['Division'])) {
        $vMensaje.='Debe seleccionar una Division. <br />';
    }
    if (empty($_POST['Turno'])) {
        $vMensaje.='Debe seleccionar un Turno. <br />';
    }

    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>