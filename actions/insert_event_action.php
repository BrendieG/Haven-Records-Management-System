<?php
include "../controllers/general_controller.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $event_name = isset($_POST['eventName']) ? trim($_POST['eventName']) : '';
    $event_location = isset($_POST['eventLocation']) ? trim($_POST['eventLocation']) : '';
    $start_time = isset($_POST['startTime']) ? trim($_POST['startTime']) : '';
    $end_time = isset($_POST['finishTime']) ? trim($_POST['finishTime']) : '';
    $event_date = isset($_POST['eventDate']) ? trim($_POST['eventDate']) : '';

    $result = insert_event_ctr($event_name, $event_location, $event_date, $start_time, $end_time);

    if ($result) {
        echo "Event record successfully created.";
    } else {
        echo "Error creating event record.";
    }
} else {
    echo "Invalid request method.";
}
?>
