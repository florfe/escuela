<?php
// Include necessary files and initialize the database connection
function Listar_ListamateriasGet($vConexion){
// Get values from POST data
$curso = $_POST['curso'];
$turno = $_POST['turno'];
$division = $_POST['division'];

// Perform a database query based on the selected values

/
// Adjust the SQL query according to your database schema and logic
$query = "SELECT NOMBRE FROM materias WHERE curso = '$curso' AND turno = '$turno' AND division = '$division'";
$result = mysqli_query($connection, $query);

// Build the HTML options for Materias dropdown
$options = '<option value="" >Selecciona...</option>';

w
while ($row = mysqli_fetch_assoc($result)) {
    
    $
$options .= '<option value="' . $row['NOMBRE'] . '">' . $row['NOMBRE'] . '</option>';
}


}
// Return the HTML options
echo $options;
?>