<?php

include_once(
    $_SERVER['DOCUMENT_ROOT'] .
    "/Projects/cairo-university/auth/auth.php"
);

?>

<nav class="navbar navbar-expand-lg nav-bar">

    <div class="container-fluid">


        <!-- Logo -->

        <a
            class="navbar-brand d-flex align-items-center"
            href="/Projects/cairo-university/">

            <span>
                Cairo University
            </span>

        </a>


        <!-- Mobile button -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- Navigation -->

        <div
            class="collapse navbar-collapse"
            id="navbarNavDropdown">


            <!-- Main navigation -->

            <ul class="navbar-nav">


                <!-- ================= STUDENTS ================= -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        Students

                    </a>


                    <ul class="dropdown-menu">

                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/view-students.php">

                                View Students

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/add-students.php">

                                Add Student

                            </a>

                        </li>

                    </ul>

                </li>


                <!-- ================= DOCTORS ================= -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        Doctors

                    </a>


                    <ul class="dropdown-menu">

                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/view-doctors.php">

                                View Doctors

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/add-doctors.php">

                                Add Doctor

                            </a>

                        </li>

                    </ul>

                </li>


                <!-- ================= DEPARTMENTS ================= -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        Departments

                    </a>


                    <ul class="dropdown-menu">

                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/view-departments.php">

                                View Departments

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/add-departments.php">

                                Add Department

                            </a>

                        </li>

                    </ul>

                </li>


                <!-- ================= COURSES ================= -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        Courses

                    </a>


                    <ul class="dropdown-menu">

                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/view-courses.php">

                                View Courses

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="/Projects/cairo-university/pages/add-courses.php">

                                Add Course

                            </a>

                        </li>

                    </ul>

                </li>


                <!-- ================= USERS ================= -->

                <?php if (isAdmin()) { ?>

                    <li class="nav-item dropdown">

                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                            Users

                        </a>


                        <ul class="dropdown-menu">

                            <li>

                                <a
                                    class="dropdown-item"
                                    href="/Projects/cairo-university/pages/view-users.php">

                                    View Users

                                </a>

                            </li>


                            <li>

                                <a
                                    class="dropdown-item"
                                    href="/Projects/cairo-university/pages/add-user.php">

                                    Add User

                                </a>

                            </li>

                        </ul>

                    </li>

                <?php } ?>


            </ul>


            

            <ul class="navbar-nav ms-auto">


                <?php if (isLoggedIn()) { ?>


                    <!-- Welcome -->

                    <li class="nav-item">

                        <span class="nav-link">

                            Welcome,
                            <?php
                            echo htmlspecialchars(
                                $_SESSION['username']
                            );
                            ?>

                        </span>

                    </li>


                    <!-- Logout -->

                    <li class="nav-item">

                        <a
                            class="logout-btn"
                            href="/Projects/cairo-university/auth/logout.php">

                            Logout

                        </a>

                    </li>


                <?php } else { ?>


                    <!-- Login -->

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="/Projects/cairo-university/auth/login.php">

                            Login

                        </a>

                    </li>


                <?php } ?>


            </ul>


        </div>

    </div>

</nav>