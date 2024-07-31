<?php
include "../controllers/general_controller.php";

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
            $uploaded_by = '2'; //get the user ID $_SESSION['user_id']
            
            insert_person_document_ctr($file_name_without_ext, $person_id, $file_name_with_ext, $uploaded_by);

            echo "File uploaded and record added successfully.";
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
}
?>
