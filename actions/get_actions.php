<?php

include "../controllers/general_controller.php";

$folders = get_all_folders_ctr();

$children = get_all_children_ctr();

$staff = get_all_staff_ctr();

$donations = get_all_donations_ctr();

$events = get_all_events_ctr();

$staff_count = get_staff_count_ctr();

$donations_count = get_donations_count_ctr();

$children_count = get_children_count_ctr();

$documents_count = get_documents_count_ctr();
?>
