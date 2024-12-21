<?php
function Validar_DatosLaboral() {
    $vMensaje='';
    if (empty($_POST['Docentes'])) {
        $vMensaje.='Debes seleccionar el Docente. <br />';
    }
    if (empty($_POST['Ciclos'])) {
        $vMensaje.='Debes seleccionar el Ciclo. <br />';
    }
    if (empty($_POST['Curso'])) {
        $vMensaje.='Debes seleccionar el Curso. <br />';
    }
    if (empty($_POST['Turno'])) {
        $vMensaje.='Debes seleccionar el Turno. <br />';
    }
    if (empty($_POST['Division'])) {
        $vMensaje.='Debes seleccionar la Division. <br />';
    }
    if (empty($_POST['Materias'])) {
        $vMensaje.='Debes seleccionar la Materia. <br />';
    }
       foreach($_POST as $Id=>$Valor){


        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}
?>