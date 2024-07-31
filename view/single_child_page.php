<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People - Single Child</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles3.css">

</head>
<body>
    <div id = "side_nav_bar">
        <div id = "brand_logo">
            <img src="../images/logo2.png" alt="Brand Logo">
        </div>
        <a href="dashboard_page.php" class = "nav_item">
            <i class ="fa fa-home"></i>
            <p>DASHBOARD</p>
        </a>
        <a href="children_page.php" class = "nav_item" style="color:#6AD4DD">
            <i class ="fa fa-users"></i>
            <p class="nav_item_p1">PEOPLE</p>
        </a>
        <a href="folders_page.php" class = "nav_item">
            <i class ="fa fa-file-text-o"></i>
            <p class="nav_item_p">DOCUMENTS</p>
        </a>
        <a href="donations_page.php" class = "nav_item">
            <i class ="fa fa-gift"></i>
            <p>DONATIONS</p>
        </a>

    </div>
    <div id = "body_section">
        <div id = "top_nav_bar">
            <i class="fa fa-user-circle"></i>
            <p id="user_name"> Ama </p>
            <div class="dropdown">
                <button onclick="dropdownToggle('myDropdown')" class="dropbtn"><i class="fa fa-angle-down"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="login_page.php">Login</a>
                    <a href="register_page.php">Register</a>
                    <a href="../actions/logout_action.php">Logout</a>
                </div>
            </div>
        </div>
        <?php
        include "../actions/get_actions.php";
        if (isset($_GET['person_id'])) {
            $person_id = $_GET['person_id'];
            $person_info = getPersonInfoById_ctr($person_id);
            $child_info = getChildInfoById_ctr($person_id);
            $first_name = $person_info['first_name'];
            $middle_name = $person_info['middle_name'];
            $last_name = $person_info['last_name'];
            $gender = $person_info['gender'];
            
            $date1 = $person_info['date_of_birth'];
            $formatted_date1 = new DateTime($date1);
            $dob = $formatted_date1->format('jS F Y');

            $date2 = $child_info['admission_date'];
            $formatted_date2 = new DateTime($date2);
            $admission_date= $formatted_date2->format('jS F Y');

            $hometown = $child_info['hometown'];
            $notes = $child_info['notes'];
            $child_id = $child_info['child_id'];
            $child_relatives = getRelativesByChildId_ctr($child_id);
            $child_image = $child_info['image_path'];
            $child_documents = getDocumentsById_ctr($person_id);
            $image_src = ($gender === 'Female') ? '../images/girl-portrait.png' : '../images/boy-portrait.png';
        }


        ?>

        <div id ="main_section">

            <div class="page_header1">
                <p class="heading_text">PEOPLE</p>
                <div class="header_divider"></div>
                <span  class="single_person_name"><?php echo $first_name ;?> <?php echo $last_name;?></span>
            </div>

            <div class="personal_info_section">
                
                
                <div class="personal_info_main">
                    <div class="personal_info">
                        <div>
                            <img src="<?php echo htmlspecialchars($image_src); ?>" alt="<?php echo htmlspecialchars($gender); ?>-portrait">
                        </div>

                        <div>
                            <div>
                                <p class="info_label">Full Name </p>
                                <p><span><?php echo $first_name;?></span> <span><?php echo $middle_name;?></span> <span><?php echo $last_name;?></span></p>
                            </div><br>
                            <div >
                                <p class="info_label">Admission Date </p>
                                <p><span><?php echo $admission_date;?></span></p>
                            </div>
                        </div>

                        <div>
                            <div>
                                <p class="info_label">Date of Birth </p>
                                <p><span><?php echo $dob;?></span></p>
                            </div><br>
                            <div>
                                <p class="info_label">Hometown </p>
                                <p><span><?php echo $hometown;?></span></p>
                            </div>
                        </div>

                        <div>
                            <div>
                                <p class="info_label">Gender </p>
                                <p><span><?php echo $gender;?></span></p>
                            </div><br>
                            <div>
                                <p class="info_label">Known Living Relatives </p>
                                <button class = "view_relatives_btn"> View List of Relatives Here<i class="fa fa-eye"></i></button> 
                            </div>
                        </div>
                        
                        
                    </div>
                    <p class="info_label">Notes</p>
                    <p> <?php echo $notes;?></p>

                    
                    
                </div>

                <div class="personal_info_edit">
                    <button class="edit_child_btn" data-first-name="<?php echo htmlspecialchars($first_name); ?>" 
        data-middle-name="<?php echo htmlspecialchars($middle_name); ?>" 
        data-last-name="<?php echo htmlspecialchars($last_name); ?>" 
        data-gender="<?php echo htmlspecialchars($gender); ?>" 
        data-dob="<?php echo htmlspecialchars($date1); ?>" 
        data-admission-date="<?php echo htmlspecialchars($date2); ?>" 
        data-hometown="<?php echo htmlspecialchars($hometown); ?>" 
        data-notes="<?php echo htmlspecialchars($notes); ?>" > Edit Personal Details<i class="fa fa-pencil"></i></button>
                </div>


            </div>
            
            <div class="header">
                <button id="openModalBtn" class="add_document_btn">
                    <span>Add new document</span>
                    <i class="fa fa-plus-circle"></i>
                </button>
                        
                <div class="search_bar">
                    <input type="text" id="search_input" placeholder="Search documents...">
                    <i class="fa fa-search"></i>
                </div>
            </div>

            <table class="doc_table">
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
                    if ($child_documents) {
                        foreach ($child_documents as $document) {
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
                                                    <a href='#' class='delete_link'><i class='fa fa-trash-o'></i>Delete</a>
                                                </div>
                                            </div>
                                            <p class='document_action_text'>More</p>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' style = 'text-align: center;'>No documents found for this person.</td></tr>";
                    }?>

                </tbody>
            </table>
        </div>
    </div>

    <!--Modal for viewing relatives -->
    <div id="viewRelativesModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="relatives_close">&times;</span>
            <h2>Relatives list</h2>
            <button class="btn">Add New Relative</button>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($child_relatives) {
                        foreach ($child_relatives as $relative) {
                            $relative_first_name = $relative['first_name'];
                            $relative_middle_name = $relative['middle_name'];
                            $relative_last_name = $relative['last_name'];
                            $relative_contact = $relative['contact'];
                            $relative_address = $relative['residential_address'];
                            $relative_relationship = $relative['relationship_name'];
                            
                            echo "</tr>
                                    <td>{$relative_first_name} {$relative_middle_name} {$relative_last_name}</td>
                                    <td>{$relative_relationship}</td>
                                    <td>{$relative_contact}</td>
                                    <td>{$relative_address}</td>
                                    <td>
                                        <button class='edit_btn'>Edit <span><i class='fa fa-pencil'></i></span></button>
                                        <button class=' delete_btn'>Delete <i class='fa fa-trash-o'></i></button>
                                    </td>
                                 </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' style = 'text-align: center;'>No relatives found for this child.</td></tr>";
                    }?>

                </tbody>
            </table>
        </div>
    </div>

    <!--Modal for editing child details -->
    <div id="editChildModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="child_close">&times;</span>
            <h2>Edit Child Details</h2>
            <form id="editChildForm" action="../actions/update_child_action.php" method="post"> 
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
                        <label for="dateOfAdmission">Date of Admission:</label>
                        <input type="date" id="dateOfAdmission" name="dateOfAdmission" required><br><br>
                    </div>
                    
                </div>

                
                    <div class="input_item">
                        <label for="hometown">Hometown:</label>
                        <input type="text" id="hometown" name="hometown" class="hometown"required><br><br>
                    </div><div class="input_item ">
                        <label for="child_notes">Notes:</label>
                        <textarea id="child_notes" name="child_notes"  class="child_notes" rows="4" cols="50"></textarea><br><br>
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
  
    <script src="../js/single_child_scripts2.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>

</body>

</html>