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
            $folder_id = $_POST['folder_id'];
            $folder_name = $_POST['folder_name'];
            $uploaded_by = $_SESSION['user_id'];
            
           
            insert_folder_document_ctr($file_name_without_ext, $folder_id, $file_name_with_ext, $uploaded_by);


            $_SESSION['status'] = "File uploaded successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../view/single_folder_page.php?folder_id=$folder_id&folder_name=$folder_name");
        } else {
            $_SESSION['status'] = "Failed to upload file.";
            $_SESSION['status_code'] = "error";
            header("Location: ../view/single_folder_page.php?folder_id=$folder_id & folder_name=$folder_name");
        }
    } else {
        $_SESSION['status'] = "Invalid request.";
        $_SESSION['status_code'] = "error";
        header("Location: ../view/single_folder_page.php?folder_id=$folder_id & folder_name=$folder_name");
    }
}
?>
