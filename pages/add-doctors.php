<?php
include('../auth/security.php');
include("../config/database.php");





// Get available departments

$department_sql = "SELECT department_id, department_name
                   FROM departments
                   ORDER BY department_name";

$department_result = mysqli_query($connection, $department_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctor_name = $_POST["doctor_name"];
    $doctor_gender = $_POST["doctor_gender"];
    $department_id = $_POST["department_id"];


    $sql = "INSERT INTO doctors
            (doctor_name, doctor_gender, department_id)
            VALUES ('$doctor_name', '$doctor_gender', '$department_id')";


    $stmt = mysqli_prepare($connection, $sql);


    

    if (mysqli_stmt_execute($stmt)) {

        echo "Doctor added successfully!";

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

    <title>Add doctor</title>

</head>

<body>

    <?php include('../includes/navbar.php'); ?>


    <section class="add-section">

        <div class="container">

            <div class="add-form">

                <!-- Header -->

                <h1 class="form-title">
                    Add Doctor
                </h1>

                <p class="form-description">
                    Enter the doctor's information below.
                </p>


                <!-- Form -->

                <form action="" method="POST">

                    <!-- doctor Name -->

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
                            placeholder="Enter doctor name"
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

                            <option value="" selected disabled>
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

                        Add doctor

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