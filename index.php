
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Your CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Cairo University</title>

</head>
<body>
<?php include('./includes/navbar.php'); ?>

 <header class="hero">

        <div class="container">

            <div class="row align-items-center">

                <!-- Welcome text -->
                <div class="col-lg-6">

                    <h1>
                        Welcome to Cairo University
                    </h1>

                    <p>
                        Cairo University Management System
                    </p>

                    <p>
                        Manage students, doctors, departments and courses
                        easily and efficiently.
                    </p>

                </div>


                <!-- University logo -->
                <div class="col-lg-6 text-center">

                    <img
                        src="images/cairo-university-logo.png"
                        alt="Cairo University Logo"
                        class="university-logo">

                </div>

            </div>

        </div>

    </header>

    <?php include('./includes/footer.php'); ?>
    
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>