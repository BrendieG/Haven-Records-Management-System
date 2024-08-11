<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $folder_id = isset($_POST['folderId']) ? trim($_POST['folderId']) : '';
    $folder_name = isset($_POST['editFolderName']) ? trim($_POST['editFolderName']) : '';
    $folder_desc = isset($_POST['editFolderDesc']) ? trim($_POST['editFolderDesc']) : '';

    $result = update_folder_ctr($folder_id, $folder_name, $folder_desc);

    if ($result) {
        $_SESSION['status'] = "Folder edited successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../view/folders_page.php');
    } else {
        $_SESSION['status'] = "Failed to make changes.";
        $_SESSION['status_code'] = "error";
        header('Location: ../view/folders_page.php');
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header('Location: ../view/folders_page.php');
}
?>
