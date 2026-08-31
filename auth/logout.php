<?php

session_start();

session_unset();

session_destroy();

header("Location: /Projects/cairo-university/auth/login.php");

exit();

?>