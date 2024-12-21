<?php
function Validar_DatosLaboral() {
    $vMensaje='';
    if (empty($_POST['Alumnos'])) {
        $vMensaje.='Debes seleccionar un Alumno. <br />';

    }
         foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>