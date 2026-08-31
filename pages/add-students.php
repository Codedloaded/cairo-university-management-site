<?php

include('../auth/security.php');
include("../config/database.php");


// Get available doctors

$doctor_sql = "SELECT doctor_id, doctor_name
               FROM doctors
               ORDER BY doctor_name";

$doctor_result = mysqli_query($connection, $doctor_sql);


// Get available departments

$department_sql = "SELECT department_id, department_name
                   FROM departments
                   ORDER BY department_name";

$department_result = mysqli_query($connection, $department_sql);


// Add student

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = $_POST["student_name"];
    $gpa = $_POST["gpa"];
    $student_gender = $_POST["student_gender"];
    $doctor_id = $_POST["doctor_id"];
    $department_id = $_POST["department_id"];


    $sql = "INSERT INTO students
            (student_name, student_gender, gpa, doctor_id, department_id)
            VALUES
            ('$student_name', '$student_gender', '$gpa', '$doctor_id', '$department_id')";


    if (mysqli_query($connection, $sql)) {

        echo "Student added successfully!";

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


    <title>Add Student</title>

</head>

<body>


    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">


                <!-- Header -->

                <h1 class="form-title">
                    Add Student
                </h1>


                <p class="form-description">
                    Enter the student's information below.
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
                            placeholder="Enter student name"
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

                            <option
                                value=""
                                selected
                                disabled>

                                Select gender

                            </option>


                            <option value="male">
                                Male
                            </option>


                            <option value="female">
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
                            placeholder="Enter GPA">

                    </div>


                    <!-- Doctor -->

                    <div class="mb-3">

                        <label
                            for="doctor_id"
                            class="form-label">

                            Doctor

                        </label>


                        <select
                            class="form-select"
                            id="doctor_id"
                            name="doctor_id"
                            required>

                            <option
                                value=""
                                selected
                                disabled>

                                Select doctor

                            </option>


                            <?php while ($doctor = mysqli_fetch_assoc($doctor_result)) { ?>

                                <option
                                    value="<?php echo $doctor['doctor_id']; ?>">

                                    <?php
                                    echo htmlspecialchars(
                                        $doctor['doctor_name']
                                    );
                                    ?>

                                </option>

                            <?php } ?>


                        </select>

                    </div>


                    <!-- Department -->

                    <div class="mb-4">

                        <label
                            for="department_id"
                            class="form-label">

                            Department

                        </label>


                        <select
                            class="form-select"
                            id="department_id"
                            name="department_id"
                            required>

                            <option
                                value=""
                                selected
                                disabled>

                                Select department

                            </option>


                            <?php while ($department = mysqli_fetch_assoc($department_result)) { ?>

                                <option
                                    value="<?php echo $department['department_id']; ?>">

                                    <?php
                                    echo htmlspecialchars(
                                        $department['department_name']
                                    );
                                    ?>

                                </option>

                            <?php } ?>


                        </select>

                    </div>


                    <!-- Submit -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Add Student

                    </button>


                </form>


            </div>

        </div>

    </section>


    <?php include("../includes/footer.php"); ?>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>