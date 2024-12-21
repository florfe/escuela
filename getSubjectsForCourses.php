<?php
function getSubjectsForCourses($connection, $courseIds) {
    $subjects = array();

    // Ensure that $courseIds is not empty to avoid SQL injection
    if (!empty($courseIds)) {
        $placeholders = implode(',', array_fill(0, count($courseIds), '?'));

        // Adjust the SQL query based on your database structure
        $query = "SELECT * FROM materias WHERE (IdCurso, IdDivision, IdTurno) IN ($placeholders)";
        $statement = $connection->prepare($query);

        // Bind parameters and execute the query
        $types = str_repeat('i', count($courseIds)); // Assuming course_id is an integer
        $statement->bind_param($types, ...$courseIds);
        $statement->execute();

        // Fetch results
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row;
        }

        // Close the statement
        $statement->close();
    }

    return $subjects;
}
?>