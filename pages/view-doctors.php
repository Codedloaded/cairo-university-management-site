<?php

include("../config/database.php");

$sql = "SELECT
            doctors.doctor_id,
            doctors.doctor_name,
            doctors.doctor_gender,
            departments.department_name
        FROM doctors
        LEFT JOIN departments
            ON doctors.department_id = departments.department_id";

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

    <title>View Doctors</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="view-section">

        <div class="container">

            <h1 class="page-title">
                Doctors
            </h1>


            <div class="table-container">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Doctor ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        while ($doctor = mysqli_fetch_assoc($result)) {

                        ?>

                            <tr>

                                <td>
                                    <?php echo $doctor['doctor_id']; ?>
                                </td>

                                <td>
                                    <?php echo $doctor['doctor_name']; ?>
                                </td>

                                <td>
                                    <?php echo $doctor['doctor_gender']; ?>
                                </td>
            

                                <td>
                                    <?php echo $doctor['department_name']; ?>
                                </td>
                                <td>

                                    <a
                                        href="edit-doctors.php?id=<?php echo $doctor['doctor_id']; ?>"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </a>

                                    <a
                                        href="delete-doctors.php?id=<?php echo $doctor['doctor_id']; ?>"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

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