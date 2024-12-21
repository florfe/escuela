<?php
// Include necessary files and configurations
require_once 'funciones/conexion.php';  // Adjust the path as needed
$MiConexion = ConexionBD();  // Assuming this function connects to the database

// Check if the 'courses' parameter is set in the POST request
if (isset($_POST['courses']) && is_array($_POST['courses']) && !empty($_POST['courses'])) {
    // Sanitize and prepare the array of course IDs
    $courseIds = array_map('intval', $_POST['courses']);
    
    // Fetch subjects based on the selected courses
    $subjects = getSubjectsForCourses($MiConexion, $courseIds);  // You need to implement this function
    
    // Return the subjects as JSON
    header('Content-Type: application/json');
    echo json_encode($subjects);
} else {
    // Handle the case when no courses are selected
    echo json_encode([]);
}

// Close the database connection or perform any cleanup if needed
CerrarConexion($MiConexion);  // Assuming this function closes the database connection
?>