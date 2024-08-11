<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $event_name = isset($_POST['eventName']) ? trim($_POST['eventName']) : '';
    $event_location = isset($_POST['eventLocation']) ? trim($_POST['eventLocation']) : '';
    $start_time = isset($_POST['startTime']) ? trim($_POST['startTime']) : '';
    $end_time = isset($_POST['finishTime']) ? trim($_POST['finishTime']) : '';
    $event_date = isset($_POST['eventDate']) ? trim($_POST['eventDate']) : '';

    $result = insert_event_ctr($event_name, $event_location, $event_date, $start_time, $end_time);

    if ($result) {
        $_SESSION['status'] = "Event added successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../view/dashboard_page.php');
    } else {
        $_SESSION['status'] = "Failed to add event.";
        $_SESSION['status_code'] = "error";
        header('Location: ../view/dashboard_page.php');
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header('Location: ../view/dashboard_page.php');
}
?>
