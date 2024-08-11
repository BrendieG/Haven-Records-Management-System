<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if (isset($_POST['register_btn'])){
    $fname = $_POST['user_fname'];
    $lname = $_POST['user_lname'];
    $email = $_POST['user_email1'];
    $encrypted_pass = password_hash($_POST['user_password1'], PASSWORD_DEFAULT);
    $role = $_POST['work_role'];

     // Check if that email already exists
    //  if (email_exists_ctr($email)) {
    //     echo "Email already exists";
    // } else {
    $role_id = getRoleById_ctr($role);



    if($role_id){
        if(register_user_ctr($fname, $lname, $email, $encrypted_pass, $role_id)){
            $_SESSION['status'] = "Signup successful!";
            $_SESSION['status_code'] = "success";
            header("Location: ../view/login_page.php");
        }else{

            $_SESSION['status'] = "Signup failed.";
            $_SESSION['status_code'] = "error";
            header('Location: ../view/register_page.php');
        }

    }else{
            $_SESSION['status'] = "Signup failed.";
            $_SESSION['status_code'] = "error";
            header('Location: ../view/register_page.php');
    }
        
    // }
} else {
   // Redirect to signup
   $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header('Location: ../view/register_page.php');
}



?>