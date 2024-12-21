<?php
function Validar_DatosAcademicosAlumnos() {
    $vMensaje='';
        if(empty($_POST['Alumnos'])) {
        $vMensaje.='Debes seleccionar un Alumno. <br />';}
        if(empty($_POST['Curso'])) {
        $vMensaje.='Debes seleccionar un Curso. <br />';}
         if(empty($_POST['Turno'])) {
        $vMensaje.='Debes seleccionar un Turno. <br />';}
        if(empty($_POST['Division'])) {
        $vMensaje.='Debes seleccionar una  Division. <br />';
    }
        if(empty($_POST['Ciclos'])) {
        $vMensaje.='Debes seleccionar un Ciclo. <br />';}
           foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}
?>