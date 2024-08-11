<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_FILES['filename']) && $_FILES['filename']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['filename'];

        $file_name_with_ext = basename($file['name']);
        $file_ext = pathinfo($file_name_with_ext, PATHINFO_EXTENSION);
        $file_name_without_ext = pathinfo($file_name_with_ext, PATHINFO_FILENAME);

        $upload_dir = '../documents/';
        $file_path = $upload_dir . $file_name_with_ext;

        if (move_uploaded_file($file['tmp_name'], $file_path)) {
           
            $person_id = $_POST['person_id'];
            $uploaded_by = $_SESSION['user_id'];
            
            
            insert_person_document_ctr($file_name_without_ext, $person_id, $file_name_with_ext, $uploaded_by);

            $_SESSION['status'] = "File uploaded successfully!";
            $_SESSION['status_code'] = "success";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous_page = $_SERVER['HTTP_REFERER'];
                header("Location: $previous_page");
            } else {
                header("Location: ../view/dashboard_page.php");
            }
        } else {
            $_SESSION['status'] = "Failed to upload file.";
            $_SESSION['status_code'] = "error";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous_page = $_SERVER['HTTP_REFERER'];
                header("Location: $previous_page");
            } else {
                header("Location: ../view/dashboard_page.php");
            }
        }
    } else {
        $_SESSION['status'] = "Invalid request.";
        $_SESSION['status_code'] = "error";
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previous_page = $_SERVER['HTTP_REFERER'];
            header("Location: $previous_page");
        } else {
            header("Location: ../view/dashboard_page.php");
        }
    }
}
?>
