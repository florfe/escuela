<?php
function getSubjectsForCourses($vConexion, $courseIds) {
    
    $subjects = array();
if (!empty($courseIds)) {
$placeholders = implode(',', array_fill(0, count($courseIds), '?'));
$query = "SELECT * FROM materias WHERE (IdCurso, IdDivision, IdTurno) IN ($placeholders)";
$statement = $vConexion->prepare($query);
$types = str_repeat('i', count($courseIds)); // Assuming course_id is an integer
$params = array_merge(array($types), $courseIds); // Combine types and values
call_user_func_array(array($statement, 'bind_param'), $params);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
$subjects[] = $row;
        }
$statement->close();
    }
return $subjects;
}
?>