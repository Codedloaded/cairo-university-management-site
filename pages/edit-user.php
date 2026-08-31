<?php

include("../auth/security.php");

if (!isAdmin()) {

    header("Location: ../index.php");
    exit();

}

include("../config/database.php");


$user_id = $_GET['id'];


$sql = "SELECT * FROM users WHERE user_id = $user_id";

$result = mysqli_query($connection, $sql);

$user = mysqli_fetch_assoc($result);


if (!$user) {

    echo "User not found.";
    exit();

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $role = $_POST["role"];


    $sql = "UPDATE users SET
                username = '$username',
                role = '$role'
            WHERE user_id = $user_id";


    if (mysqli_query($connection, $sql)) {

        header("Location: view-users.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($connection);

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Your CSS -->

    <link
        rel="stylesheet"
        href="../css/style.css">


    <title>Edit User</title>

</head>

<body>


    <?php include("../includes/navbar.php"); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">


                <!-- Header -->

                <h1 class="form-title">
                    Edit User
                </h1>


                <p class="form-description">
                    Update the user's information below.
                </p>


                <!-- Form -->

                <form method="POST">


                    <!-- Username -->

                    <div class="mb-3">

                        <label
                            for="username"
                            class="form-label">

                            Username

                        </label>


                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            name="username"
                            value="<?php echo htmlspecialchars($user['username']); ?>"
                            required>

                    </div>


                    <!-- Role -->

                    <div class="mb-4">

                        <label
                            for="role"
                            class="form-label">

                            Role

                        </label>


                        <select
                            class="form-select"
                            id="role"
                            name="role"
                            required>


                            <option
                                value="user"
                                <?php
                                if ($user['role'] == 'user') {
                                    echo 'selected';
                                }
                                ?>>

                                User

                            </option>


                            <option
                                value="sub_admin"
                                <?php
                                if ($user['role'] == 'sub_admin') {
                                    echo 'selected';
                                }
                                ?>>

                                Sub-admin

                            </option>


                            <option
                                value="admin"
                                <?php
                                if ($user['role'] == 'admin') {
                                    echo 'selected';
                                }
                                ?>>

                                Admin

                            </option>


                        </select>

                    </div>


                    <!-- Update button -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Update User

                    </button>


                </form>

            </div>

        </div>

    </section>


    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>