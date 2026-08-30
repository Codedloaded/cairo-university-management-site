<?php

include("../config/database.php");

$sql = "SELECT
            courses.course_id,
            courses.course_name,
            courses.weight,
            departments.department_name
        FROM courses
        LEFT JOIN departments
            ON courses.department_id = departments.department_id";

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

    <title>View Courses</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="view-section">

        <div class="container">

            <h1 class="page-title">
                Courses
            </h1>


            <div class="table-container">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Weight</th>
                            <th>Department</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        while ($course = mysqli_fetch_assoc($result)) {

                        ?>

                            <tr>

                                <td>
                                    <?php echo $course['course_id']; ?>
                                </td>

                                <td>
                                    <?php echo $course['course_name']; ?>
                                </td>

                                <td>
                                    <?php echo $course['weight']; ?>
                                </td>

                                
                                <td>
                                    <?php echo $course['department_name']; ?>
                                </td>
                                <td>

                                    <a
                                        href="edit-courses.php?id=<?php echo $course['course_id']; ?>"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </a>

                                    <a
                                        href="delete-courses.php?id=<?php echo $course['course_id']; ?>"
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