<?php
include "../controllers/general_controller.php";
include "../settings/core.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $event_id = isset($_POST['event_id']) ? trim($_POST['event_id']) : '';
    $event_name = isset($_POST['editEventName']) ? trim($_POST['editEventName']) : '';
    $event_location = isset($_POST['editEventLocation']) ? trim($_POST['editEventLocation']) : '';
    $start_time = isset($_POST['editStartTime']) ? trim($_POST['editStartTime']) : '';
    $end_time = isset($_POST['esitFinishTime']) ? trim($_POST['esitFinishTime']) : '';
    $event_date = isset($_POST['editEventDate']) ? trim($_POST['editEventDate']) : '';

    $result = update_event_ctr($event_id, $event_name, $event_location, $event_date, $start_time, $end_time);

    if ($result) {
        $_SESSION['status'] = "Event edited successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../view/dashboard_page.php');
    } else {
        $_SESSION['status'] = "Failed to make changes.";
        $_SESSION['status_code'] = "error";
        header('Location: ../view/dashboard_page.php');
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header('Location: ../view/dashboard_page.php');
}
?>
