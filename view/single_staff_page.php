<?php
include '../settings/core.php';

require_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People - Single Staff</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
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
        <a href="children_page.php" class = "nav_item" style="color:#6AD4DD">
            <i class ="fa fa-users"></i>
            <p class="nav_item_p1">PEOPLE</p>
        </a>
        <?php
            if(is_admin()){
                echo"<a href='folders_page.php' class = 'nav_item'>";
                echo"<i class ='fa fa-file-text-o'></i>";
                echo'<p class="nav_item_p">DOCUMENTS</p>';
                echo'</a>';
            }
        ?>
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


        //Getting the staff details
        if (isset($_GET['person_id'])) {
            $person_id = $_GET['person_id'];
            $person_info = getPersonInfoById_ctr($person_id);
            $staff_info = getStaffInfoById_ctr($person_id);
            $first_name = $person_info['first_name'];
            $middle_name = $person_info['middle_name'];
            $last_name = $person_info['last_name'];
            $gender = $person_info['gender'];

            $date1 = $person_info['date_of_birth'];
            $formatted_date1 = new DateTime($date1);
            $dob = $formatted_date1->format('jS F Y');

            $primary_contact = $person_info['contact'];
            $secondary_contact = $staff_info['secondary_contact'];

            $date2 = $staff_info['employment_start'];
            $formatted_date2 = new DateTime($date2);
            $employment_date = $formatted_date2->format('jS F Y');

            $email = $staff_info['email'];
            $address = $staff_info['residential_address'];
            $role_id =$staff_info['role_id'];
            $staff_id =$staff_info['staff_id'];
            $work_role = getRoleName_ctr($role_id);
            $staff_documents = getDocumentsById_ctr($person_id);

            $image_src = ($gender === 'Female') ? '../images/woman-portrait.png' : '../images/man-portrait.png';

        }
        ?>

        <!-- The main page section -->
        <div id ="main_section">

            <div class="page_header2">
                <p class="heading_text">PEOPLE</p>
                <div class="header_divider"></div>
                <span  class="single_person_name"><?php echo $first_name ;?> <?php echo $last_name;?></span>
            </div>

            <div class="personal_info_section">
                
                
                <div class="personal_info_main">
                    <div class="personal_info">
                        <div>
                            <img src="<?php echo htmlspecialchars($image_src); ?>" alt="<?php echo htmlspecialchars($gender); ?>-portrait">

                            <?php
                            if(is_admin() || $_SESSION['user_id'] == $staff_id){
                                echo "
                                <div class='personal_info_edit'>
                                    <button class='edit_staff_btn' 
                                        data-first-name='" . htmlspecialchars($first_name) . "' 
                                        data-middle-name='" . htmlspecialchars($middle_name) . "' 
                                        data-last-name='" . htmlspecialchars($last_name) . "' 
                                        data-gender='" . htmlspecialchars($gender) . "' 
                                        data-dob='" . htmlspecialchars($date1) . "' 
                                        data-employment-date='" . htmlspecialchars($date2) . "' 
                                        data-primary-contact='" . htmlspecialchars($primary_contact) . "' 
                                        data-secondary-contact='" . htmlspecialchars($secondary_contact) . "'
                                        data-email='" . htmlspecialchars($email) . "'
                                        data-address='" . htmlspecialchars($address) . "' 
                                        data-work-role='" . htmlspecialchars($work_role) . "'>
                                        Edit Personal Details<i class='fa fa-pencil'></i>
                                    </button>
                                </div>
                                ";
                            }
                            ?>

                        </div>

                        <div>
                            <div>
                                <p class="info_label">Full Name </p>
                                <p><?php echo $first_name;?> <?php echo $middle_name;?> <?php echo $last_name;?></p>
                            </div><br>
                            <div >
                                <p class="info_label">Email </p>
                                <p><?php echo $email;?></p>
                            </div><br>
                            <div>
                                <p class="info_label">Work Role </p>
                                <p><?php echo $work_role;?></p>
                            </div>
                        </div>

                        <div>
                            <div>
                                <p class="info_label">Date of Birth </p>
                                <p><?php echo $dob;?></p>
                            </div><br>
                            <div>
                                <p class="info_label">Primary Contact </p>
                                <p><?php echo $primary_contact;?></p>
                            </div><br>

                            <?php
                            if(is_admin()){
                                echo "
                                <div>
                                    <p class='info_label'>Employment Start</p>
                                    <p>{$employment_date}</p>
                                </div>
                                ";
                            }
                            ?>

                        </div>

                        <div>
                            <div>
                                <p class="info_label">Gender </p>
                                <p><?php echo $gender;?></p>
                            </div><br>
                            <div>
                                <p class="info_label">Secondary Contact </p>
                                <p><?php echo $secondary_contact;?></p>
                            </div><br>
                            <?php
                            if(is_admin()){
                                echo "
                                <div>
                                    <p class='info_label'>Residential Address</p>
                                    <p>{$address}</p>
                                </div>
                                ";
                            }
                            ?>
                        </div>
                        
                        
                    </div>
                    
                    
                </div>

            </div>
            


            <?php
                if(is_admin() || $_SESSION['user_id'] == $staff_id){
                    echo "
                    <div class='header'>
                        <button id='openModalBtn' class='add_document_btn'>
                            <span>Add new document</span>
                            <i class='fa fa-plus-circle'></i>
                        </button>
                                    
                        <div class='search_bar'>
                            <input type='text' id='search_input' onkeyup='searchFunction()' placeholder='Search documents...'>
                            <i class='fa fa-search'></i>
                        </div>
                    </div>

                    <table class='doc_table' id='staff_doc_table'>
                        <thead>
                            <tr>
                                <th>DOCUMENT NAME</th>
                                <th>CREATED BY</th>
                                <th>DATE UPLOADED</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";

                    if ($staff_documents) {
                        foreach ($staff_documents as $document) {
                            // Extract document details
                            $document_id = $document['document_id'];
                            $document_name = $document['document_name'];
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
                    } else {
                        echo "<tr><td colspan='4' style='text-align: center;'>No documents found for this person.</td></tr>";
                    }

                    echo "
                        </tbody>
                    </table>
                    ";
                }
                ?>


            
        </div>
    </div>



    <!--Modal for editing staff details -->
    <div id="editStaffModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="staff_close">&times;</span>
            <h2>Edit Staff Details</h2>
            <form id="editStaffForm" action="../actions/update_staff_action.php" method="post">
            <input type="text" name="person_id" id="person_id" value = "<?php echo $person_id;?>" hidden>

                <div class="input_group">
                    <div class="input_item">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" required><br><br>
                    </div>
                    
                    <div class="input_item">
                        <label for="middleName">Middle Name:</label>
                        <input type="text" id="middleName" name="middleName"><br><br>
                    </div>

                    <div class="input_item">    
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" required><br><br>
                    </div>
                </div>

                <div class=" dates_gender_group">
                    <div class="input_item ">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" class="child_gender" required>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select><br><br>
                    </div>
                    <div class="input_item">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required><br><br>
                    </div>
                    <div class="input_item admission_date">
                        <label for="employmentStartDate">Date of Employment:</label>
                        <input type="date" id="employmentStartDate" name="employmentStartDate" required><br><br>
                    </div>
                    
                </div>
                <div class="input_group ">
                    <div class="input_item">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br><br>
                    </div>
                    <div class="input_item  work_rol">
                        <label for="work_role">Work Role:</label>
                        <select id="work_role" name="work_role" class="staff_work_role" required>
                            <option value="Volunteer">Volunteer</option>
                            <option value="Caregiver">Caregiver</option>
                            <option value="Administrator">Administrator</option>
                        </select><br><br>
                    </div>

                </div>

                <div class="input_group">
                    
                    <div class="input_item">
                        <label for="primaryContact">Primary Contact:</label>
                        <input type="tel" id="primaryContact" name="primaryContact" class="contact" required><br><br>
                    </div>

                    <div class="input_item">
                        <label for="secondaryContact">Secondary Contact:</label>
                        <input type="tel" id="secondaryContact" name="secondaryContact" class="contact"><br><br>
                    </div>
                </div>


                
                <div class="input_item">
                    <label for="address"> Residential Address:</label>
                    <input type="text" id="address" name="address" class="address"required><br><br>
                </div>
                
     
                <button type="submit">Save Changes</button>
            </form>
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
            <form id="uploadForm" enctype="multipart/form-data" method="post" action="../actions/insert_person_doc_action.php">
                <input type="file" id="myFile" name="filename" style= "border: none; margin-bottom:10px; ">
            
                <input type="hidden" name="person_id" value="<?php echo htmlspecialchars($person_id); ?>">
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
  
    <script src="../js/single_staff_scripts.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>
    <script>
        function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('search_input');
        filter = input.value.toUpperCase();
        table = document.getElementById("staff_doc_table");
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