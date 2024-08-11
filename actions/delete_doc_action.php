<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $document_id = isset($_POST['delete_document_id']) ? trim($_POST['delete_document_id']) : '';

    // Fetch the document details from the database
    $document = get_document_by_id_ctr($document_id);
    if ($document) {
        $file_path = $document['file_path'];
        $full_file_path = '../documents/' . $file_path;

        // Delete the file from the documents folder
        if (unlink($full_file_path)) {
            // Delete the document record from the database
            $delete_document = delete_document_ctr($document_id);

            if ($delete_document) {
                $_SESSION['status'] = "Document deleted successfully!";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "Failed to delete document from the database.";
                $_SESSION['status_code'] = "error";
            }
        } else {
            $_SESSION['status'] = "Failed to delete the file.";
            $_SESSION['status_code'] = "error";
        }
    } else {
        $_SESSION['status'] = "Document not found.";
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
