<?php

include('../auth/security.php');

if (!isAdminOrSubAdmin()) {

    header("Location: view-doctors.php");
    exit();

}

include("../config/database.php");



// Get available departments

$department_sql = "SELECT department_id, department_name
                   FROM departments
                   ORDER BY department_name";

$department_result = mysqli_query($connection, $department_sql);

$doctor_id = $_GET['id'];

$sql = "SELECT * FROM doctors WHERE doctor_id = $doctor_id";

$result = mysqli_query($connection, $sql);

$doctor = mysqli_fetch_assoc($result);

if (!$doctor) {

    echo "Doctor not found.";
    exit();
}
$doctor_id = $_GET['id'];




$sql = "SELECT * FROM doctors WHERE doctor_id = $doctor_id";

$result = mysqli_query($connection, $sql);

$doctor = mysqli_fetch_assoc($result);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctor_name = $_POST["doctor_name"];
    $doctor_gender = $_POST["doctor_gender"];
    $department_id = $_POST["department_id"];


    $sql = "UPDATE doctors SET
                doctor_name = '$doctor_name',
                doctor_gender = '$doctor_gender',
                department_id = '$department_id'
            WHERE doctor_id = $doctor_id";


    if (mysqli_query($connection, $sql)) {

        header("Location: view-doctors.php");
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

    <title>Edit Doctor</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <h1 class="form-title">
                    Edit Doctor
                </h1>

                <p class="form-description">
                    Update the doctor's information below.
                </p>


                <form action="" method="POST">


                    <!-- Doctor Name -->

                    <div class="mb-3">

                        <label
                            for="doctor_name"
                            class="form-label">

                            Doctor Name

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="doctor_name"
                            name="doctor_name"
                            value="<?php echo $doctor['doctor_name']; ?>"
                            required>

                    </div>


                    <!-- Gender -->

                    <div class="mb-3">

                        <label
                            for="doctor_gender"
                            class="form-label">

                            Gender

                        </label>

                        <select
                            class="form-select"
                            id="doctor_gender"
                            name="doctor_gender"
                            required>

                            <option value="male"
                                <?php
                                if ($doctor['doctor_gender'] == 'male') {
                                    echo 'selected';
                                }
                                ?>>
                                Male
                            </option>

                            <option value="female"
                                <?php
                                if ($doctor['doctor_gender'] == 'female') {
                                    echo 'selected';
                                }
                                ?>>
                                Female
                            </option>

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


                    <!-- Update -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        Update Doctor

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