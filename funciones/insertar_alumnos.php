<?php 
function InsertarAlumnos($vConexion){

    $edad = $_POST['Edad'];

$SQL_Insert="INSERT INTO alumnos (
    Nombre, 
    Apellido, 
    IdTipoDni, 
    NumeroDni, 
    VencimientoDni, 
    Cuil, 
    IdTelefono, 
    NumeroTel, 
    FechaNacimiento, 
    Edad, 
    IdSexo, 
    Calle, 
    Numero, 
    Piso, 
    Departamento, 
    Barrio, 
    Localidad, 
    Provincia, 
    Pais, 
    Email, 
    FechaIngreso)
VALUES ('".$_POST['Nombre']."', 
    '".$_POST['Apellido']."', 
    '".$_POST['TipoDNI']."',
    '".$_POST['NumeroDni']."', 
    '".$_POST['FechaVencimiento']."',
    '".$_POST['Cuil']."', 
    '".$_POST['TipoTel']."',
    '".$_POST['NumeroTel']."',
    '".$_POST['FechaNacimiento']."',
    '".$edad."', 
    '".$_POST['Sexo']."', 
    '".$_POST['Calle']."', 
    '".$_POST['Numero']."', 
    '".$_POST['Piso']."', 
    '".$_POST['Departamento']."', 
    '".$_POST['Barrio']."', 
    '".$_POST['Localidad']."', 
    '".$_POST['Provincia']."', 
    '".$_POST['Pais']."', 
    '".$_POST['Email']."', 
    '".$_POST['FechaInscripcion']."')";
if (!mysqli_query($vConexion, $SQL_Insert)) {
//si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar el registro: ' . mysqli_error($vConexion) . '</h4>');
    }
    return true;
}
?>