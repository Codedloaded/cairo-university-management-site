<?php

session_start();

include("../config/database.php");


if (isset($_SESSION['user_id'])) {

    header("Location: ../index.php");
    exit();

}


$error = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    

    if ($password !== $confirm_password) {

        $error = "Passwords do not match.";

    }


    

    elseif (strlen($username) < 3) {

        $error = "Username must be at least 3 characters.";

    }


    

    elseif (strlen($password) < 6) {

        $error = "Password must be at least 6 characters.";

    }


    else {

        // Check if username already exists

        $check_sql = "SELECT user_id
                      FROM users
                      WHERE username = ?";

        $check_stmt = mysqli_prepare(
            $connection,
            $check_sql
        );

        mysqli_stmt_bind_param(
            $check_stmt,
            "s",
            $username
        );

        mysqli_stmt_execute($check_stmt);

        $check_result = mysqli_stmt_get_result($check_stmt);


        if (mysqli_num_rows($check_result) > 0) {

            $error = "Username already exists.";

        }

        else {

            // Hash password

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );


            // New accounts are always normal users

            $role = "user";


            // Insert user

            $insert_sql = "INSERT INTO users
                           (username, password, role)
                           VALUES (?, ?, ?)";

            $insert_stmt = mysqli_prepare(
                $connection,
                $insert_sql
            );

            mysqli_stmt_bind_param(
                $insert_stmt,
                "sss",
                $username,
                $hashed_password,
                $role
            );


            if (mysqli_stmt_execute($insert_stmt)) {

                $success = "Account created successfully! You can now log in.";

            }
            else {

                $error = "Something went wrong. Please try again.";

            }

        }

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


    <title>Sign Up</title>

</head>

<body>


    <section class="add-section">

        <div class="container">

            <div class="add-form">


                <h1 class="form-title">
                    Create Account
                </h1>


                <p class="form-description">
                    Create an account to access Cairo University.
                </p>


                <?php if ($error != "") { ?>

                    <div class="alert alert-danger">

                        <?php echo htmlspecialchars($error); ?>

                    </div>

                <?php } ?>


                <?php if ($success != "") { ?>

                    <div class="alert alert-success">

                        <?php echo htmlspecialchars($success); ?>

                    </div>

                <?php } ?>


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


                    <!-- Confirm Password -->

                    <div class="mb-4">

                        <label
                            for="confirm_password"
                            class="form-label">

                            Confirm Password

                        </label>


                        <input
                            type="password"
                            class="form-control"
                            id="confirm_password"
                            name="confirm_password"
                            placeholder="Confirm password"
                            required>

                    </div>


                    <!-- Sign Up -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Sign Up

                    </button>


                </form>


                <!-- Login -->

                <div class="text-center mt-4">

                    <p>

                        Already have an account?

                        <a
                            href="login.php"
                            style="color: #1D3557; font-weight: bold;">

                            Login

                        </a>

                    </p>

                </div>


            </div>

        </div>

    </section>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>