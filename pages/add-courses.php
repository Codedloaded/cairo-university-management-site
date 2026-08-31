<?php
include('../auth/security.php');
include("../config/database.php");


// Get available departments

$department_sql = "SELECT department_id, department_name
                   FROM departments
                   ORDER BY department_name";

$department_result = mysqli_query($connection, $department_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $course_name = $_POST["course_name"];
    $weight = $_POST["weight"];
    $department_id = $_POST["department_id"];
    $course_code = $_POST["course_code"];


    $sql = "INSERT INTO courses
            (course_name, weight, department_id,course_code)
            VALUES ('$course_name', '$weight', '$department_id','$course_code')";


    $stmt = mysqli_prepare($connection, $sql);


    

    if (mysqli_stmt_execute($stmt)) {

        echo "Course added successfully!";

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

    <title>Add course</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <!-- Header -->

                <h1 class="form-title">
                    Add Course
                </h1>

                <p class="form-description">
                    Enter the course's information below.
                </p>


                <!-- Form -->

                <form action="" method="POST">

                    <!-- course Name -->

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
                            placeholder="Enter course name"
                            required>

                    </div>
                    <!-- weight-->
                    <div class="mb-3">

                        <label
                            for="weight"
                            class="form-label">

                            Course Weight

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="weight"
                            name="weight"
                            placeholder="Enter course weight"
                            required>

                    </div>

                    <!-- department id-->
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
                    <!-- Course code-->
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
                            placeholder="Enter course code"
                            required>

                    </div>


                    




                    <!-- Submit -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Add course

                    </button>

                </form>

            </div>

        </div>

    </section>
    <?php include("../includes/footer.php")?>

   <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>