<?php
include "../controllers/general_controller.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $folder_name = isset($_POST['folderName']) ? trim($_POST['folderName']) : '';
    $folder_desc = isset($_POST['folderDescription']) ? trim($_POST['folderDescription']) : '';

    $result = insert_folder_ctr($folder_name, $folder_desc);

    if ($result) {
        echo "Folder created successfully.";
    } else {
        echo "Error creating folder.";
    }
} else {
    echo "Invalid request method.";
}
?>
