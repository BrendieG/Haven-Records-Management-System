<?php
include '../settings/core.php';

require_login();
check_role()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents - Single Folder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <div id = "side_nav_bar">
        <!-- The side navigation bar -->
        <div id="brand_logo">
            <a href="../view/dashboard_page.php">
                <img src="../images/logo2.png" alt="Brand Logo">
            </a>
        </div>
        <a href="dashboard_page.php" class = "nav_item">
            <i class ="fa fa-home"></i>
            <p>DASHBOARD</p>
        </a>
        <a href="children_page.php" class = "nav_item">
            <i class ="fa fa-users"></i>
            <p class="nav_item_p1">PEOPLE</p>
        </a>
        <a href="folders_page.php" class = "nav_item" style="color:#6AD4DD">
            <i class ="fa fa-file-text-o"></i>
            <p class="nav_item_p">DOCUMENTS</p>
        </a>
        <a href="donations_page.php" class = "nav_item">
            <i class ="fa fa-gift"></i>
            <p>DONATIONS</p>
        </a>

    </div>
    <div id = "body_section">
        <!-- The top navigation bar -->
        <div id = "top_nav_bar">
            <i class="fa fa-user-circle"></i>
            <p id="user_name"> <?php   
            
            echo $_SESSION['user_name'];?> </p>
            <div class="dropdown">
                <button onclick="dropdownToggle('myDropdown')" class="dropbtn"><i class="fa fa-angle-down"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="../actions/logout_action.php">Logout</a>
                </div>
            </div>
        </div>
        <?php
        include "../actions/get_actions.php";
        
            if (isset($_GET['folder_id']) && isset($_GET['folder_name'])) {
                $folder_id = $_GET['folder_id'];
                $folder_name = $_GET['folder_name'];
                $folder_documents = get_folder_documents_ctr($folder_id);
            }
        ?>
        <!-- The main page section -->
        <div id ="main_section">
            <p class="heading_text">DOCUMENTS</p>
            <p class="single_folder_name"><?php echo $folder_name;?></p>
            <div class="header">
                <button id="openModalBtn" class="add_document_btn">
                    <span>Add new document</span>
                    <i class="fa fa-plus-circle"></i>
                </button>
                        
                <div class="search_bar">
                    <input type="text" id="search_input" onkeyup="searchFunction()" placeholder="Search documents...">
                    <i class="fa fa-search"></i>
                </div>
            </div>


            <table class="doc_table" id="doc_table">
                <thead>
                    <tr>
                        <th>DOCUMENT NAME</th>
                        <th>CREATED BY</th>
                        <th>DATE UPLOADED</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    if ($folder_documents) {
                        foreach ($folder_documents as $document) {
                            // Extract document details
                            $document_name = $document['document_name'];
                            $document_id = $document['document_id'];
                            $uploaded_by = $document['uploaded_by'];
                            $upload_date = $document['upload_date'];
                            $pdf = $document['file_path']; // Assuming there is a field for the PDF file name
                            $staff_info = getPersonInfoByStaffId_ctr($uploaded_by);
                            
                            echo "<tr>
                                    <td>{$document_name}</td>
                                    <td>{$staff_info['first_name']} {$staff_info['last_name']}</td>
                                    <td>{$upload_date}</td>
                                    <td class='document_actions'>
                                        <div class='doc_btn'>
                                            <a class='document_action_btn document_btn' href='../view/view_document.php?pdf=" . urlencode($pdf) . "'><i class='fa fa-eye'></i></a>
                                            <p class='document_action_text p3'>View</p>
                                        </div>
                                        <div class='doc_btn'>
                                            <a class='document_action_btn document_btn' href='../documents/{$pdf}' download><i class='fa fa-download'></i></a>
                                            <p class='document_action_text p4'>Download</p>
                                        </div>
                                        <div>
                                            <div class='doc_dropdown'>
                                                <button onclick=\"toggleMenuDropdown('doc_dropdown_content')\" class='doc_dropbtn'><i class='fa fa-ellipsis-v'></i></button>
                                                <div class='doc_dropdown_content'>
                                                    <a href='#' class='edit_link' data-document-id='$document_id' data-document-name='$document_name'><i class='fa fa-pencil'></i>Edit</a>
                                                    <a href='#' class='delete_link' data-document-id='$document_id' data-document-name='$document_name'><i class='fa fa-trash-o'></i>Delete</a>
                                                </div>
                                            </div>
                                            <p class='document_action_text'>More</p>
                                        </div>
                                    </td>
                                  </tr>";
                        }

                    }else{
                        echo "<tr><td colspan='4' style = 'text-align: center;'>No documents found for this folder.</td></tr>";
                    }
                    ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal for editing a document -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="edit_close">&times;</span>
            <h2>Edit Document</h2>
            <form id="editForm" action="../actions/update_doc_action.php" method="post">
                <input type="text" name="document_id" id="document_id" hidden>
           
                <label for="edit_document_name">Edit Document Name:</label><br>
                <input type="text" id="edit_document_name" name="edit_document_name" required><br><br><br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    
      <!--Modal for adding a document -->
    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="add_close">&times;</span>
            <h2>Upload Document</h2>
            <p style= "text-align:center;">Please select a PDF document to upload.</p>
            <form id="uploadForm" enctype="multipart/form-data" method="post" action="../actions/insert_folder_doc_action.php">
                <input type="file" id="myFile" name="filename" style= "border: none; margin-bottom:10px; ">
            
                <input type="hidden" name="folder_id" value="<?php echo htmlspecialchars($folder_id); ?>">
                <input type="hidden" name="folder_name" value="<?php echo htmlspecialchars($folder_name); ?>">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!--Modal for deleting a document -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="delete_close">&times;</span>
            <h2>Are you sure you want to delete this document?</h2>
            <p style= "text-align:center;">This will permanently delete this document from storage</p>
            <p class="delete_doc_name" style="text-align:center; font-weight:bold;"><br><span> </span>.pdf </p><br>
            <div style = "display:flex; flex-direction:row; gap:50px;">
        
            <button  id='cancel_btn'>Cancel</button>
            
            <form id="deleteForm" enctype="multipart/form-data" method="post" action="../actions/delete_doc_action.php">
                <input type="text" name="delete_document_id" id="delete_document_id" hidden>
                <button type="submit" class='dlt_btn'>Delete</button>
            </form>
            </div>
        </div>
    </div>

    <script src="../js/single_folder_scripts.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>

    <script>
        function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('search_input');
        filter = input.value.toUpperCase();
        table = document.getElementById("doc_table");
        tr = table.getElementsByTagName('tr');

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        ?>
        <script>
            Swal.fire({
            title: "<?php echo $_SESSION['status'];?>",
            //text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code'];?>",
            width: 400,
            confirmButtonColor: "#002E35"
            });

        </script>
        <?php
            unset($_SESSION['status']);
    }
    ?>

</body>

</html>