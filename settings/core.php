<?php
//start session
session_start(); 

//for header redirection
ob_start();

//funtion to check for login
function is_logged_in() {
    return isset($_SESSION['user_name']);
}

//function to check for role (admin, customer, etc)
function check_role(){
    if ($_SESSION['user_role']!=1){
        header("Location: ../view/dashboard_page.php");
    }
}

function is_admin() {
    return ($_SESSION['user_role']==1);
}

// Redirect to login if not logged in
function require_login() {
    if (!is_logged_in()) {
        header("Location: ../view/login_page.php");
        exit();
    }
}


?>