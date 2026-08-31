<?php
include('../auth/security.php');
include("../config/database.php");
include("../includes/auth.php");

if (!isLoggedIn()) {

    header("Location: login.php");
    exit();

}

if (!isAdmin()) {

    header("Location: view-courses.php");
    exit();

}



$course_id = $_GET['id'];




$sql = "DELETE FROM courses
        WHERE course_id = $course_id";


if (mysqli_query($connection, $sql)) {

    header("Location: view-courses.php");
    exit();

} else {

    echo "Error: " . mysqli_error($connection);

}

?>