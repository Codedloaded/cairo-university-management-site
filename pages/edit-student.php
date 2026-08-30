<?php

include("../config/database.php");



$student_id = $_GET['id'];



$sql = "SELECT * FROM students WHERE student_id = $student_id";

$result = mysqli_query($connection, $sql);

$student = mysqli_fetch_assoc($result);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = $_POST["student_name"];
    $student_gender = $_POST["student_gender"];
    $gpa = $_POST["gpa"];
    $doctor_id = $_POST["doctor_id"];
    $department_id = $_POST["department_id"];


    $sql = "UPDATE students SET
                student_name = '$student_name',
                student_gender = '$student_gender',
                gpa = '$gpa',
                doctor_id = '$doctor_id',
                department_id = '$department_id'
            WHERE student_id = $student_id";


    if (mysqli_query($connection, $sql)) {

        header("Location: view-students.php");
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

    <title>Edit Student</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <h1 class="form-title">
                    Edit Student
                </h1>

                <p class="form-description">
                    Update the student's information below.
                </p>


                <form action="" method="POST">


                    <!-- Student Name -->

                    <div class="mb-3">

                        <label
                            for="student_name"
                            class="form-label">

                            Student Name

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="student_name"
                            name="student_name"
                            value="<?php echo $student['student_name']; ?>"
                            required>

                    </div>


                    <!-- Gender -->

                    <div class="mb-3">

                        <label
                            for="student_gender"
                            class="form-label">

                            Gender

                        </label>

                        <select
                            class="form-select"
                            id="student_gender"
                            name="student_gender"
                            required>

                            <option value="male"
                                <?php
                                if ($student['student_gender'] == 'male') {
                                    echo 'selected';
                                }
                                ?>>
                                Male
                            </option>

                            <option value="female"
                                <?php
                                if ($student['student_gender'] == 'female') {
                                    echo 'selected';
                                }
                                ?>>
                                Female
                            </option>

                        </select>

                    </div>


                    <!-- GPA -->

                    <div class="mb-3">

                        <label
                            for="gpa"
                            class="form-label">

                            GPA

                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="gpa"
                            name="gpa"
                            step="0.01"
                            min="0"
                            max="4"
                            value="<?php echo $student['gpa']; ?>">

                    </div>


                    <!-- Doctor -->

                    <div class="mb-3">

                        <label
                            for="doctor_id"
                            class="form-label">

                            Doctor ID

                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="doctor_id"
                            name="doctor_id"
                            value="<?php echo $student['doctor_id']; ?>">

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
                            value="<?php echo $student['department_id']; ?>">

                    </div>


                    <!-- Update -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Update Student

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