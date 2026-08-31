<?php

include("../auth/security.php");

if (!isAdmin()) {

    header("Location: ../index.php");
    exit();

}

include("../config/database.php");

$sql = "SELECT user_id, username, role FROM users";

$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="../css/style.css">

    <title>Users</title>

</head>

<body>

    <?php include("../includes/navbar.php"); ?>


    <section class="view-section">

        <div class="container">

            <h1 class="page-title">
                Users
            </h1>


            <div class="table-container">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php while ($user = mysqli_fetch_assoc($result)) { ?>

                            <tr>

                                <td>
                                    <?php echo $user['user_id']; ?>
                                </td>


                                <td>
                                    <?php
                                    echo htmlspecialchars($user['username']);
                                    ?>
                                </td>


                                <td>
                                    <?php
                                    echo htmlspecialchars($user['role']);
                                    ?>
                                </td>


                                <td>

                                    <a
                                        href="edit-user.php?id=<?php echo $user['user_id']; ?>"
                                        class="btn btn-primary btn-sm">

                                        Edit

                                    </a>


                                    <a
                                        href="delete-user.php?id=<?php echo $user['user_id']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this user?');">

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>


    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>