<?php
include "../controllers/general_controller.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $document_id = isset($_POST['document_id']) ? trim($_POST['document_id']) : '';
    $new_document_name =  isset($_POST['edit_document_name']) ? trim($_POST['edit_document_name']) : '';


        // Fetch the old document details from the database
    $document = get_document_by_id_ctr($document_id);
    if ($document) {
        $old_document_name = $document['document_name'];
        $file_path = $document['file_path'];

        // Construct old and new file paths
        $old_file_path = '../documents/' . $file_path;
        $new_file_path = pathinfo($old_file_path, PATHINFO_DIRNAME) . '/' . $new_document_name . '.' . pathinfo($old_file_path, PATHINFO_EXTENSION);

        // Rename the file in the documents folder
        if (rename($old_file_path, $new_file_path)) {
            // Update the database with the new document name and file path
            $update_document = update_document_ctr($document_id, $new_document_name, basename($new_file_path));

            if ($update_document) {
                echo "Document updated successfully.";
            } else {
                echo "Failed to update document in the database.";
            }
        } else {
            echo "Failed to rename the file.";
        }
    } else {
        echo "Document not found.";
    }
    
} else {
    echo "Invalid request method.";
}
?>
