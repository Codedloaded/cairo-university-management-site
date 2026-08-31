<?php
include('../auth/security.php');
include("../config/database.php");
include("../includes/auth.php");

if (!isLoggedIn()) {

    header("Location: login.php");
    exit();

}

if (!isAdmin()) {

    header("Location: view-students.php");
    exit();

}



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