<?php
include('../auth/security.php');

if (!isAdminOrSubAdmin()) {

    header("Location: view-departments.php");
    exit();

}

include("../config/database.php");

$department_id = $_GET['id'];

$sql = "SELECT * FROM departments WHERE department_id = $department_id";

$result = mysqli_query($connection, $sql);

$department = mysqli_fetch_assoc($result);

if (!$department) {

    echo "Department not found.";
    exit();
}
$department_id = $_GET['id'];


// Get current department information

$sql = "SELECT * FROM departments WHERE department_id = $department_id";

$result = mysqli_query($connection, $sql);

$department = mysqli_fetch_assoc($result);


// If form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $department_name = $_POST["department_name"];
    $department_code = $_POST["department_code"];


    $sql = "UPDATE departments SET
                department_name = '$department_name',
                department_code = '$department_code'
            WHERE department_id = $department_id";


    if (mysqli_query($connection, $sql)) {

        header("Location: view-departments.php");
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

    <title>Edit Department</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <!-- Header -->

                <h1 class="form-title">
                    Edit Department
                </h1>

                <p class="form-description">
                    Update the department's information below.
                </p>


                <form action="" method="POST">


                    <!-- Department Name -->

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
                            value="<?php echo $department['department_name']; ?>"
                            required>

                    </div>


                    <!-- Department Code -->

                    <div class="mb-4">

                        <label
                            for="department_code"
                            class="form-label">

                            Department Code

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="department_code"
                            name="department_code"
                            value="<?php echo $department['department_code']; ?>"
                            required>

                    </div>


                    <!-- Update -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Update Department

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