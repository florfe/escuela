<?php
function Validar_RegistroCursos() {
    $vMensaje='';
    
 if(empty($_POST['Materias'])) {
        $vMensaje.='Debes seleccionar una MATERIA. <br />';
    }
if(empty($_POST['IdCurso'])) {
        $vMensaje.='Debes seleccionar un CURSO. <br />';
    }
    if(empty($_POST['IdTurno'])) {
        $vMensaje.='Debes seleccionar un TURNO. <br />';
    }
    if(empty($_POST['IdDivision'])) {
        $vMensaje.='Debes seleccionar una DIVISION. <br />';
    }
    
 


    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>