<?php
include "../controllers/general_controller.php";
include "../settings/core.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $mname = isset($_POST['middleName']) ? trim($_POST['middleName']) : '';
    $lname = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
    $date_of_admission = isset($_POST['dateOfAdmission']) ? trim($_POST['dateOfAdmission']) : '';
    $hometown = isset($_POST['hometown']) ? trim($_POST['hometown']) : '';
    $notes = isset($_POST['child_notes']) ? trim($_POST['child_notes']) : '';

    $result = insert_child_ctr($fname, $mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes);

    if ($result) {
        $_SESSION['status'] = "Child record created successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../view/children_page.php');
    } else {
        $_SESSION['status'] = "Failed to create child record.";
        $_SESSION['status_code'] = "error";
        header('Location: ../view/children_page.php');
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header('Location: ../view/children_page.php');
}
?>
