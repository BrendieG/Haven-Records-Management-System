<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $folder_id = isset($_POST['delete_folder_id']) ? trim($_POST['delete_folder_id']) : '';

    // Fetch the document details from the database
    $folder_empty = check_folder_empty_ctr($folder_id);
    if ($folder_empty) {

        // Delete the folder record from the database
        $delete_folder = delete_folder_ctr($folder_id);

        if ($delete_folder) {
            $_SESSION['status'] = "Folder deleted successfully!";
            $_SESSION['status_message'] = "Click OK to continue.";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "Failed to delete folder.";
            $_SESSION['status_message'] = "Click OK to continue.";
            $_SESSION['status_code'] = "error";
        }
        
    } else {
        $_SESSION['status'] = "Failed to delete the folder.";
        $_SESSION['status_message'] = "Cannot delete folder if it is not empty. Delete all documents and try again";
        $_SESSION['status_code'] = "error";
    }

    // Redirect to the previous page or a default page
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");
    } else {
        header("Location: ../view/dashboard_page.php");
    }
    exit();
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_message'] = "Click OK to continue.";
    $_SESSION['status_code'] = "error";
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");
    } else {
        header("Location: ../view/dashboard_page.php");
    }
    exit();
}
?>
