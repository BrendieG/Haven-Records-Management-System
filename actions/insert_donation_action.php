<?php
include "../controllers/general_controller.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $lname = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
    $date = isset($_POST['donation_date']) ? trim($_POST['donation_date']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $notes = isset($_POST['donation_notes']) ? trim($_POST['donation_notes']) : '';
    $items = isset($_POST['items_donated']) ? trim($_POST['items_donated']) : '';
    $amount = isset($_POST['amount_donated']) ? trim($_POST['amount_donated']) : '';
    $uploaded_by = '2';

    $result = insert_donation_ctr($fname, $lname, $email, $contact, $date, $amount, $items, $notes, $uploaded_by);

    if ($result) {
        echo "Donation record successfully created.";
    } else {
        echo "Error creating donation record.";
    }
} else {
    echo "Invalid request method.";
}
?>
