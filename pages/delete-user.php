<?php

include("../auth/security.php");

if (!isAdmin()) {

    header("Location: ../index.php");
    exit();

}

include("../config/database.php");

$user_id = $_GET['id'];

$sql = "DELETE FROM users
        WHERE user_id = $user_id";


if (mysqli_query($connection, $sql)) {

    header("Location: view-user.php");
    exit();

} else {

    echo "Error: " . mysqli_error($connection);

}

?>