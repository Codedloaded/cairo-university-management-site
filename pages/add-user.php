<?php

include("../auth/security.php");

if (!isAdmin()) {

    header("Location: ../index.php");
    exit();

}

include("../config/database.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];


    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );


    $sql = "INSERT INTO users
            (username, password, role)
            VALUES
            ('$username', '$hashed_password', '$role')";


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


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Your CSS -->

    <link
        rel="stylesheet"
        href="../css/style.css">


    <title>Add User</title>

</head>

<body>


    <?php include("../includes/navbar.php"); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">


                <!-- Header -->

                <h1 class="form-title">
                    Add User
                </h1>


                <p class="form-description">
                    Create a new system user.
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
                            placeholder="Enter username"
                            required>

                    </div>


                    <!-- Password -->

                    <div class="mb-3">

                        <label
                            for="password"
                            class="form-label">

                            Password

                        </label>


                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Enter password"
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
                            name="role"
                            id="role"
                            class="form-select"
                            required>

                            <option
                                value="user">

                                User

                            </option>


                            <option
                                value="sub_admin">

                                Sub-admin

                            </option>


                            <option
                                value="admin">

                                Admin

                            </option>

                        </select>

                    </div>


                    <!-- Submit -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Add User

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