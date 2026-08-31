<?php
include('../auth/security.php');
include("../config/database.php");
include("../includes/auth.php");

if (!isLoggedIn()) {

    header("Location: login.php");
    exit();

}

if (!isAdmin()) {

    header("Location: view-departments.php");
    exit();

}



$department_id = $_GET['id'];




$sql = "DELETE FROM departments
        WHERE department_id = $department_id";


if (mysqli_query($connection, $sql)) {

    header("Location: view-department");
    exit();

} else {

    echo "Error: " . mysqli_error($connection);

}

?>