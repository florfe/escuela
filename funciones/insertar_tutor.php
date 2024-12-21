<?php 
function InsertarTutor($vConexion){
error_log(print_r($_POST, true)); 
    $edad = $_POST['Edad'];

$SQL_Insert="INSERT INTO tutor (
       IdAlumno, 
       Vinculo, 
       Nombre, 
       Apellido, 
       IdDni, 
       NumDni, 
       VenciDni, 
       Cuil, 
       Edad, 
       FechaNacimiento, 
       IdTelefono, 
       Telefono, 
       Email, 
       Sexo, 
       Calle, 
       Numero, 
       Departamento, 
       Piso, 
       Barrio, 
       Localidad, 
       Provincia, 
       Pais) 
VALUES ('".$_POST['Alumnos']."',
       '".$_POST['Vinculo']."',
       '".$_POST['Nombre']."',
       '".$_POST['Apellido']."',
       '".$_POST['TipoDni']."',
       '".$_POST['NumDni']."',
       '".$_POST['FechaVencimiento']."',
       '".$_POST['Cuil']."',
       '".$edad."', 
       '".$_POST['FechaNacimiento']."',
       '".$_POST['TipoTel']."',
       '".$_POST['NumeroTel']."',
       '".$_POST['Email']."',
       '".$_POST['Sexo']."',
       '".$_POST['Calle']."',
       '".$_POST['Numero']."',
       '".$_POST['Departamento']."',
       '".$_POST['Piso']."',
       '".$_POST['Barrio']."',
       '".$_POST['Localidad']."',
       '".$_POST['Provincia']."',
       '".$_POST['Pais']."')";
if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
}
?>