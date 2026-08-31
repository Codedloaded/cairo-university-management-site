<?php
include('../auth/security.php');
include("../config/database.php");
include("../includes/auth.php");

if (!isLoggedIn()) {

    header("Location: login.php");
    exit();

}

if (!isAdmin()) {

    header("Location: view-doctors.php");
    exit();

}



$doctor_id = $_GET['id'];




$sql = "DELETE FROM doctors
        WHERE doctor_id = $doctor_id";


if (mysqli_query($connection, $sql)) {

    header("Location: view-doctors.php");
    exit();

} else {

    echo "Error: " . mysqli_error($connection);

}

?>