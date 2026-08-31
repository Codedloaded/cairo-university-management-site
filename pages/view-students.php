
<?php
include('../auth/security.php');
include("../config/database.php");

$sql = "SELECT 
            students.student_id,
            students.student_name,
            students.student_gender,
            students.gpa,
            doctors.doctor_name,
            departments.department_name
        FROM students
        LEFT JOIN doctors
            ON students.doctor_id = doctors.doctor_id
        LEFT JOIN departments
            ON students.department_id = departments.department_id";

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

    <title>View Students</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="view-section">

        <div class="container">

            <h1 class="page-title">
                Students
            </h1>


            <div class="table-container">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>GPA</th>
                            <th>Doctor</th>
                            <th>Department</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        while ($student = mysqli_fetch_assoc($result)) {

                        ?>

                            <tr>

                                <td>
                                    <?php echo $student['student_id']; ?>
                                </td>

                                <td>
                                    <?php echo $student['student_name']; ?>
                                </td>

                                <td>
                                    <?php echo $student['student_gender']; ?>
                                </td>

                                <td>
                                    <?php echo $student['gpa']; ?>
                                </td>

                                <td>
                                    <?php echo $student['doctor_name']; ?>
                                </td>

                                <td>
                                    <?php echo $student['department_name']; ?>
                                </td>
                                <td>

                                    <?php if (isAdminOrSubAdmin()) { ?>

                                        <a
                                            href="edit-student.php?id=<?php echo $student['student_id']; ?>"
                                            class="btn btn-primary btn-sm">

                                            Edit

                                        </a>

                                    <?php } ?>

                                    <?php if (isAdmin()) { ?>

                                        <a
                                            href="delete-student.php?id=<?php echo $student['student_id']; ?>"
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