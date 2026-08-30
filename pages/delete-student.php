<?php

include("../config/database.php");




$student_id = $_GET['id'];




$sql = "DELETE FROM students
        WHERE student_id = $student_id";


if (mysqli_query($connection, $sql)) {

    header("Location: view-students.php");
    exit();

} else {

    echo "Error: " . mysqli_error($connection);

}

?>