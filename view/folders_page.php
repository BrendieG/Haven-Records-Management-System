<?php
include '../settings/core.php';

require_login();
check_role();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body >
    <!-- The side navigation bar -->
    <div id = "side_nav_bar">
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

        <!-- The main page section -->
        <div id ="main_section">
            <p class="heading_text">DOCUMENTS</p>
            <div class="folders_section">
                <button class="add_folder_btn" ><i class="fa fa-folder-open"></i><br>Create New Folder</button>
                
                <?php
                include "../actions/get_actions.php";

                foreach($folders as $folder){
                    $folder_id = $folder['folder_id'];
                    $folder_name =$folder['folder_name'];
                    $date = new DateTime($folder['date_created']);
                    $formatted_date = $date->format('d/m/Y');
                    $folder_desc =$folder['folder_description'];

                    echo "<div class='folder'>";
                    
                    echo "<a  href='single_folder_page.php?folder_id={$folder_id} & folder_name={$folder_name}'>";
                    echo "<h3>{$folder_name}</h3>";
                    echo "<p class='folder_text'>Created <span class='folder_date'>$formatted_date</span></p>";
                    echo "<p class='folder_desc'>{$folder_desc}</p>";
                    echo "</a>";
                    echo "<div class='folder_actions'>";
                    echo "<button class='edit_folder_btn' data-folder-id='$folder_id' data-folder-name='$folder_name' data-folder-desc='$folder_desc'> <i class='fa fa-pencil'></i></button>";
                    echo "<button class='delete_folder_btn' data-folder-id='$folder_id' data-folder-name='$folder_name'> <i class='fa fa-trash-o'></i></button>";
                    echo "</div>";
                    echo "</div>";
                    
                }         
                ?>
            </div>
        </div>
    </div>

    <!-- Modal for creating a new Folder -->
    <div id="addFolderModal" class="modal">
        <div class="modal-content">
            <span class="close" id="add_close">&times;</span>
            <h2>Create New Folder</h2>
            <form id="createFolderForm" action="../actions/insert_folder_action.php" method="post">
                <label for="folderName">Folder Name:</label><br>
                <input type="text" id="folderName" name="folderName"  placeholder="Enter folder name here..." required><br><br>
                <label for="folderDescription">Folder Description:</label><br>
                <textarea id="folderDescription" name="folderDescription" rows="4" cols="50"  placeholder="Enter folder description here..."></textarea><br><br>
                <button type="submit">Create Folder</button>
            </form>
        </div>
    </div>

    <!-- Modal for editing a Folder -->
    <div id="editFolderModal" class="modal">
        <div class="modal-content">
            <span id="edit_close" class="close">&times;</span>
            <h2>Edit Folder</h2>
            <form id="editFolderForm" action="../actions/update_folder_action.php" method="post">
                <input type="hidden" id="folderId" name="folderId">
                <label for="editFolderName">Folder Name:</label><br>
                <input type="text" id="editFolderName" name="editFolderName" required><br><br>
                <label for="editFolderDesc">Folder Description:</label><br>
                <textarea id="editFolderDesc" name="editFolderDesc"rows="4" cols="50"  required></textarea><br><br>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!--Modal for deleting a folder -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="delete_close">&times;</span>
            <h2>Are you sure you want to delete this folder?</h2>
            <p style= "text-align:center;">This will permanently delete this folder from storage</p>
            <p class="delete_folder_name" style="text-align:center; font-weight:bold;"><br> <span> </span> </p><br>
            <div style = "display:flex; flex-direction:row; gap:50px;">
        
            <button  id='cancel_btn'>Cancel</button>
            
            <form id="deleteForm" enctype="multipart/form-data" method="post" action="../actions/delete_folder_action.php">
                <input type="text" name="delete_folder_id" id="delete_folder_id" hidden>
                <button type="submit" class='dlt_btn'>Delete</button>
            </form>
            </div>
        </div>
    </div>

    <script src="../js/document_scripts.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        ?>
        <script>
            Swal.fire({
            title: "<?php echo $_SESSION['status'];?>",
            text: "<?php echo $_SESSION['status_message'];?>",
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