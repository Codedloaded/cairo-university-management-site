<?php

include_once("../config/database.php");
include_once("auth.php");

if (isLoggedIn()) {

    header("Location: ../index.php");
    exit();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($connection, $sql);

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: ../index.php");
        exit();

    } else {

        $error = "Invalid username or password.";

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
          href="../css/style.css">

    <title>Login</title>

</head>

<body>


<section class="add-section">

    <div class="container">

        <div class="add-form">

            <h1 class="form-title">
                Login
            </h1>

            <p class="form-description">
                Login to Cairo University Management System
            </p>


            <?php if (isset($error)) { ?>

                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>

            <?php } ?>


            <form method="POST">


                

                <div class="mb-3">

                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        required>

                </div>


                

                <div class="mb-4">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary w-100">

                    Login

                </button>

            </form>
                <div class="text-center mt-4">

                <p>

                    Don't have an account?

                    <a
                        href="signup.php"
                        style="color: #1D3557; font-weight: bold;">

                        Sign Up

                    </a>

                </p>

            </div>
        </div>

    </div>

</section>

</body>

</html>