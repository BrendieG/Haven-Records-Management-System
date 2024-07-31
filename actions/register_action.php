<?php
include "../controllers/general_controller.php";

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
            header("Location: ../view/login_page.php");
            exit();
        }else{
            echo "Signup Failed. You will be redirected soon...";
            sleep(2);
            header("Location: ../view/register_page.php");
            exit();
        }

    }else{
        echo "Signup Failed. You will be redirected soon...";
        sleep(2);
        header("Location: ../view/register_page.php");
        exit();
    }
        
    // }
} else {
   // Redirect to signup
   header("Location: ../view/signup.php");
}



?>