<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $person_id = isset($_POST['person_id']) ? trim($_POST['person_id']) : '';
    $fname = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $mname = isset($_POST['middleName']) ? trim($_POST['middleName']) : '';
    $lname = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
    $date_of_employment = isset($_POST['employmentStartDate']) ? trim($_POST['employmentStartDate']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $primary_contact = isset($_POST['primaryContact']) ? trim($_POST['primaryContact']) : '';
    $secondary_contact = isset($_POST['secondaryContact']) ? trim($_POST['secondaryContact']) : '';
    $work_role = isset($_POST['work_role']) ? trim($_POST['work_role']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';

    $role_id = getRoleById_ctr($work_role);

    $result = update_staff_ctr($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_employment, $email, $role_id, $primary_contact, $secondary_contact, $address);

    if ($result) {
        $_SESSION['status'] = "Staff record edited successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../view/single_staff_page.php?person_id=$person_id");

    } else {
        $_SESSION['status'] = "Failed to make changes.";
        $_SESSION['status_code'] = "error";
        header("Location: ../view/single_staff_page.php?person_id=$person_id");
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header("Location: ../view/single_staff_page.php?person_id=$person_id");
}
?>
