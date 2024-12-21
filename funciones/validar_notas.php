<?php
function Validar_Notas() {
    $vMensaje='';
    
      
    
    
if(empty($_POST['Curso'])) {
        $vMensaje.='Debes seleccionar un Curso. <br />';
    }
   
    if(empty($_POST['Materias'])) {
        $vMensaje.='Debes seleccionar una  Materia. <br />';
    }

    foreach($_POST as $Id=>$Valor){
if (is_scalar($_POST[$Id])) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
}
    return $vMensaje;

}

?>