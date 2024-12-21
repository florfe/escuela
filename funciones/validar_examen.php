<?php
function Validar_Examen() {
    $vMensaje='';
    
      
    
    if(empty($_POST['Alumnos'])) {
        $vMensaje.='Debes seleccionar un Alumno. <br />';
    }
    if(empty($_POST['Curso'])) {
        $vMensaje.='Debes seleccionar un Curso. <br />';
    }
    
    if(empty($_POST['Materias'])) {
        $vMensaje.='Debes seleccionar una  Materia. <br />';
    }
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>