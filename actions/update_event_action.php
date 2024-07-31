<?php
include "../controllers/general_controller.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $event_id = isset($_POST['event_id']) ? trim($_POST['event_id']) : '';
    $event_name = isset($_POST['editEventName']) ? trim($_POST['editEventName']) : '';
    $event_location = isset($_POST['editEventLocation']) ? trim($_POST['editEventLocation']) : '';
    $start_time = isset($_POST['editStartTime']) ? trim($_POST['editStartTime']) : '';
    $end_time = isset($_POST['esitFinishTime']) ? trim($_POST['esitFinishTime']) : '';
    $event_date = isset($_POST['editEventDate']) ? trim($_POST['editEventDate']) : '';

    $result = update_event_ctr($event_id, $event_name, $event_location, $event_date, $start_time, $end_time);

    if ($result) {
        echo "Event record successfully updated.";
    } else {
        echo "Error updating event record.";
    }
} else {
    echo "Invalid request method.";
}
?>
