<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $folder_name = isset($_POST['folderName']) ? trim($_POST['folderName']) : '';
    $folder_desc = isset($_POST['folderDescription']) ? trim($_POST['folderDescription']) : '';

    $result = insert_folder_ctr($folder_name, $folder_desc);

    if ($result) {
        $_SESSION['status'] = "Folder created successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../view/folders_page.php');
    } else {
        $_SESSION['status'] = "Failed to create Folder.";
        $_SESSION['status_code'] = "error";
        header('Location: ../view/folders_page.php');
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";
    header('Location: ../view/folders_page.php');
}
?>
