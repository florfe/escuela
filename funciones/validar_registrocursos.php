<?php
function Validar_RegistroCursos() {
    $vMensaje='';
    if(empty($_POST['Curso'])) {
        $vMensaje.='Debes seleccionar una  opcion de CURSO. <br />';
    }
 if(empty($_POST['Division'])) {
        $vMensaje.='Debes seleccionar una  opcion de DIVISION. <br />';
    }
     if(empty($_POST['Turno'])) {
        $vMensaje.='Debes seleccionar una  opcion de TURNO. <br />';
    }
      if(empty($_POST['Ciclos'])) {
        $vMensaje.='Debes seleccionar una  opcion de CICLO. <br />';
    }

    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>