<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if (isset($_POST['login_btn'])) {
    $email = $_POST['user_email'];
    $pass = $_POST['user_password'];

    // Check if email exists and password is correct
    $user = login_check($email, $pass);

    if ($user) {
        $personID = $user['person_id'];
        $staff_info = getStaffInfoById_ctr($personID);
        $_SESSION['user_id'] = $staff_info['staff_id'];
        $_SESSION['user_role'] = $user['role_id'];
        $person_info = getPersonInfoById_ctr($personID);
        $_SESSION['user_name'] = $person_info['first_name'];

        $_SESSION['status'] = "Login successfull!";
        $_SESSION['status_code'] = "success";
        header('Location: ../view/dashboard_page.php');

        
        
    } else {
        $_SESSION['status'] = "Login failed.";
        $_SESSION['status_code'] = "error";
        header('Location: ../view/login_page.php');
    }
}



?>