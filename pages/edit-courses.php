<?php

include("../config/database.php");

$course_id = $_GET['id'];


// Get the current course information

$sql = "SELECT * FROM courses WHERE course_id = $course_id";

$result = mysqli_query($connection, $sql);

$course = mysqli_fetch_assoc($result);


// If form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $course_name = $_POST["course_name"];
    $course_code = $_POST["course_code"];
    $weight = $_POST["weight"];
    $department_id = $_POST["department_id"];


    $sql = "UPDATE courses SET
                course_name = '$course_name',
                course_code = '$course_code',
                weight = '$weight',
                department_id = '$department_id'
            WHERE course_id = $course_id";


    if (mysqli_query($connection, $sql)) {

        header("Location: view-courses.php");
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <title>Edit Course</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <!-- Header -->

                <h1 class="form-title">
                    Edit Course
                </h1>

                <p class="form-description">
                    Update the course's information below.
                </p>


                <!-- Form -->

                <form action="" method="POST">


                    <!-- Course Name -->

                    <div class="mb-3">

                        <label
                            for="course_name"
                            class="form-label">

                            Course Name

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="course_name"
                            name="course_name"
                            value="<?php echo $course['course_name']; ?>"
                            required>

                    </div>


                    <!-- Course Code -->

                    <div class="mb-3">

                        <label
                            for="course_code"
                            class="form-label">

                            Course Code

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="course_code"
                            name="course_code"
                            value="<?php echo $course['course_code']; ?>"
                            required>

                    </div>


                    <!-- Weight -->

                    <div class="mb-3">

                        <label
                            for="weight"
                            class="form-label">

                            Weight

                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="weight"
                            name="weight"
                            value="<?php echo $course['weight']; ?>"
                            required>

                    </div>


                    <!-- Department -->

                    <div class="mb-4">

                        <label
                            for="department_id"
                            class="form-label">

                            Department ID

                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="department_id"
                            name="department_id"
                            value="<?php echo $course['department_id']; ?>"
                            required>

                    </div>


                    <!-- Update -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Update Course

                    </button>

                </form>

            </div>

        </div>

    </section>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>