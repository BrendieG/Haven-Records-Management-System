<?php
include "../controllers/general_controller.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $folder_id = isset($_POST['folderId']) ? trim($_POST['folderId']) : '';
    $folder_name = isset($_POST['editFolderName']) ? trim($_POST['editFolderName']) : '';
    $folder_desc = isset($_POST['editFolderDesc']) ? trim($_POST['editFolderDesc']) : '';

    $result = update_folder_ctr($folder_id, $folder_name, $folder_desc);

    if ($result) {
        echo "Folder successfully updated.";
    } else {
        echo "Error updating folder.";
    }
} else {
    echo "Invalid request method.";
}
?>
