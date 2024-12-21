<?php 
function InsertarDocentes($vConexion){
   


    // Proceed with the insertion if the teacher doesn't exist
    $edad = $_POST['Edad'];
    $SQL_Insert = "INSERT INTO docentes (
        Nombre, 
        Apellido, 
        NumeroDni, 
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
        Email)
    VALUES ('" . $_POST['Nombre'] . "', 
        '" . $_POST['Apellido'] . "', 
        '" . $_POST['NumeroDni'] . "',
        '" . $_POST['Cuil'] . "', 
        '" . $_POST['TipoTel'] . "',
        '" . $_POST['NumeroTel'] . "',
        '" . $_POST['FechaNacimiento'] . "',
        '" . $edad . "', 
        '" . $_POST['Sexo'] . "', 
        '" . $_POST['Calle'] . "', 
        '" . $_POST['Numero'] . "', 
        '" . $_POST['Piso'] . "', 
        '" . $_POST['Departamento'] . "', 
        '" . $_POST['Barrio'] . "', 
        '" . $_POST['Localidad'] . "', 
        '" . $_POST['Provincia'] . "', 
        '" . $_POST['Pais'] . "', 
        '" . $_POST['Email'] . "')";

    if (!mysqli_query($vConexion, $SQL_Insert)) {
        // If there is an error, terminate the script execution with a message
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>