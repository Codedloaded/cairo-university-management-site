<?php

include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $department_name = $_POST["department_name"];
    $department_code = $_POST["department_code"];


    $sql = "INSERT INTO departments
            (department_name, department_code)
            VALUES ('$department_name', '$department_code')";


    $stmt = mysqli_prepare($connection, $sql);


    

    if (mysqli_stmt_execute($stmt)) {

        echo "Department added successfully!";

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

    <title>Add department</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <!-- Header -->

                <h1 class="form-title">
                    Add Department
                </h1>

                <p class="form-description">
                    Enter the department's information below.
                </p>


                <!-- Form -->

                <form action="" method="POST">

                    <!-- department Name -->

                    <div class="mb-3">

                        <label
                            for="department_name"
                            class="form-label">

                            Department Name

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="department_name"
                            name="department_name"
                            placeholder="Enter department name"
                            required>

                    </div>
                    <!-- department code-->
                    <div class="mb-3">

                        <label
                            for="department_code"
                            class="form-label">

                            Department code

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="department_code"
                            name="department_code"
                            placeholder="Enter department code"
                            required>

                    </div>

                    




                    <!-- Submit -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Add department

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