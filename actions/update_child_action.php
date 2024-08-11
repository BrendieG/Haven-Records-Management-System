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
    $date_of_admission = isset($_POST['dateOfAdmission']) ? trim($_POST['dateOfAdmission']) : '';
    $hometown = isset($_POST['hometown']) ? trim($_POST['hometown']) : '';
    $notes = isset($_POST['child_notes']) ? trim($_POST['child_notes']) : '';

    $result = update_child_ctr($person_id, $fname, $mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes);

    if ($result) {
        $_SESSION['status'] = "Child record edited successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../view/single_child_page.php?person_id=$person_id");

    } else {
        $_SESSION['status'] = "Failed to make changes.";
        $_SESSION['status_code'] = "error";
        header("Location: ../view/single_child_page.php?person_id=$person_id");
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header("Location: ../view/single_child_page.php?person_id=$person_id");
}
?>
