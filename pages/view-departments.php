<?php
include("../auth/security.php");
include("../config/database.php");

$sql = "SELECT * FROM departments";

$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <title>View Departments</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="view-section">

        <div class="container">

            <h1 class="page-title">
                Departments
            </h1>


            <div class="table-container">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Department ID</th>
                            <th>Department Name</th>
                            <th>Code</th>
                            <th>Actions</th>
                            
                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        while ($department = mysqli_fetch_assoc($result)) {

                        ?>

                            <tr>

                                <td>
                                    <?php echo $department['department_id']; ?>
                                </td>

                                <td>
                                    <?php echo $department['department_name']; ?>
                                </td>

                                <td>
                                    <?php echo $department['department_code']; ?>
                                </td>
                                <td>

                                    <?php if (isAdminOrSubAdmin()) { ?>

                                        <a
                                            href="edit-departments.php?id=<?php echo $department['department_id']; ?>"
                                            class="btn btn-primary btn-sm">

                                            Edit

                                        </a>

                                    <?php } ?>

                                    <?php if (isAdmin()) { ?>

                                        <a
                                            href="delete-departments.php?id=<?php echo $department['department_id']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?');">

                                            Delete

                                        </a>

                                    <?php } ?>

                                </td>
                                

                            </tr>

                        <?php

                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

<?php include("../includes/footer.php")?>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>