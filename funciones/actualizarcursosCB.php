<?php
function ActualizarDocentes($vConexion) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
      
    $curso = $_POST['curso'];
    $divi = $_POST['division'];
    $tur = $_POST['turno'];
    $materia = $_POST['materia'];
    
  
    // If the combination doesn't exist, proceed with the update
    $updateSQL = "UPDATE materias SET Nombre='$materia', IdCurso='$curso', IdDivision='$divi', IdTurno='$tur'
               WHERE Id='$id'";
    
    if (!mysqli_query($vConexion, $updateSQL)) {
        // If there's an error during the update, show an error message
        die('<h4>Error al intentar actualizar el registro.</h4>');
    }
    
    return true;
}
?>