<?php

include_once("auth.php");

if (!isLoggedIn()) {

    header("Location: /Projects/cairo-university/auth/login.php");
    exit();

}

?>