<?php
function Validar_Horario() {
    $vMensaje='';
    
      
    
    if(empty($_POST['IdCurso'])) {
        $vMensaje.='Debes seleccionar un Curso. <br />';
    }
 if(empty($_POST['Materias'])) {
        $vMensaje.='Debes seleccionar una Materia. <br />';
    }

     if(empty($_POST['Dia'])) {
        $vMensaje.='Debes seleccionar un Dia. <br />';
    }
     if(empty($_POST['Horario_ingreso'])) {
        $vMensaje.='Debes seleccionar un Horario de Ingreso. <br />';
    }
     if(empty($_POST['Horario_salida'])) {
        $vMensaje.='Debes seleccionar un Horario de Salida. <br />';
    }



    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>