<?php
function Validar_DatosAcademicos() {
    $vMensaje='';
     if(empty($_POST['Docentes'])) {
        $vMensaje.='Debes seleccionar un Docente. <br />';
    }
        if (empty($_POST['Legajo'])) {
        $vMensaje.='Debes ingresar el Legajo. <br />';
    }
       foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}
?>