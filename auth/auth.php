<?php

session_start();

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function hasRole($role)
{
    return isset($_SESSION['role']) &&
           $_SESSION['role'] == $role;
}

function isAdmin()
{
    return hasRole('admin');
}

function isAdminOrSubAdmin()
{
    return hasRole('admin') || hasRole('sub_admin');
}

?>