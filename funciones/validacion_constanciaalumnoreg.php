<?php
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_POST['NumeroDni']) != 8) {
        $vMensaje.='El DNI debe contener 8 números. <br />';
    }
    
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>