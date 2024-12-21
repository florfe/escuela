<?php

require_once 'funciones/conexion.php';



$cursoId = $_POST['CursoId'];


$materia = $_POST['Materia'];

// Function to check if a record exists for the selected course and subject

function checkExistingRecord($conexion, $cursoId, $materia) {
    $query = "SELECT COUNT(*) as count FROM notas WHERE CursoId = ? AND Materia = ?";
    
    
$statement = $conexion->prepare($query);
    
   
$statement->bind_param("ss", $cursoId, $materia);
    
    
$statement->execute();
    
    
$result = $statement->get_result();
    
$row = $result->fetch_assoc();
    
  
$count = $row['count'];
    
   
$statement->close();

    

return $count > 0;
}

// Connect to the database
$MiConexion = ConexionBD();

// Check for an existing record
$exists = checkExistingRecord($MiConexion, $cursoId, $materia);

// Return the result as JSON

header('Content-Type: application/json');

echo json_encode(['exists' => $exists]);

// Close the database connection

mysqli_close($MiConexion);
?>