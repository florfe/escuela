<?php
function Validar_Datos() {
    $vMensaje='';
    if (empty($_POST['Alumnos'])) {
        $vMensaje.='Debes seleccionar un Alumno. <br />';}
        if (empty($_POST['Vinculo'])) {
        $vMensaje.='Debes seleccionar un Vinculo. <br />';}
    if (empty($_POST['Apellido'])) {
        $vMensaje.='Debes ingresar Apellido. <br />';}
    if (empty($_POST['Nombre'])) {
        $vMensaje.='Debes ingresar Nombre. <br />';}
 if (empty($_POST['Email'])) {
        $vMensaje.='Debes ingresar un Email. <br />';}
         if (empty($_POST['Sexo'])) {
        $vMensaje.='Debes seleccionar el Sexo. <br />';}
         if (empty($_POST['FechaNacimiento'])) {
        $vMensaje.='Debes ingresar Fecha de Nacimiento. <br />';}
    if (strlen($_POST['NumDni']) != 8) {
        $vMensaje.='DNI incorrecto! 8 números, sin puntos. <br />';}
         if (empty($_POST['FechaVencimiento'])) {
        $vMensaje.='Debes seleccionar una Fecha de Vencimiento de Dni. <br />';}
    if (strlen($_POST['Cuil']) != 11) {
        $vMensaje.='CUIL incorrecto! 11 números, sin guión. <br />';}
        
    if (empty($_POST['NumeroTel'])) {
        $vMensaje.='Debes ingresar un Numero de Telefono. <br />';}
         if (empty($_POST['Calle'])) {
        $vMensaje.='Debes ingresar una Calle. <br />';}
         if (empty($_POST['Numero'])) {
        $vMensaje.='Debes ingresar un Numero. <br />';}
    if (empty($_POST['Barrio'])) {
        $vMensaje.='Debes seleccionar el Barrio. <br />';} 
    if (empty($_POST['Localidad'])) {
        $vMensaje.='Debes seleccionar la Localidad. <br />';}




    
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $vMensaje;

}

?>