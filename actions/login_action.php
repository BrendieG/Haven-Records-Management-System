<?php
include "../controllers/general_controller.php";

if (isset($_POST['login_btn'])) {
    $email = $_POST['user_email'];
    $pass = $_POST['user_password'];

    // Check if email exists and password is correct
    $user = login_check($email, $pass);

    if ($user) {
        // session_start();
        // $_SESSION['user_id'] = $user['customer_id'];
        // $_SESSION['user_role'] = $user['user_role'];
        // $_SESSION['user_name'] = $user['customer_fname'];


        header("Location: ../view/dashboard_page.php");
        exit();
  
        
        
    } else {
        // Redirect to home
    header("Location: ../view/login_page.php");
    }
}



?>