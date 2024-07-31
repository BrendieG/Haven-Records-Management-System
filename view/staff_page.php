<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People - Staff page</title>
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
        <div id ="main_section">
            <p class="heading_text">PEOPLE</p>
            
            <div class="header">
                <div>
                    <span class="single_folder_name">Staff</span>
                </div>
                        
                <div class="search_bar">
                    <input type="text" id="search_input" placeholder="Search...">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <?php include "../actions/get_actions.php"; ?>
            <p class="top_section_text">Total number of staff: <span><?php echo $staff_count;?></span></p>

            <div class="top_section">
            <div class = "page_switch">
                
                <a href="children_page.php" class = "children_link staff_unfocused_page"><p>Children</p></a>
                <p class="focused_page">Staff</p>
                
            </div>

            
            <!-- <button class="add_staff_btn"> Add Staff <i class="fa fa-plus-circle"></i></button> -->
            </div>
            

            <table class="people_table">
                <thead>
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>ROLE</th>
                        <th>EMAIL</th>
                        <th>INFO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($staff as $staff_member){
                        
    
                        $person_id =$staff_member['person_id'];
                        $person_info = getPersonInfoById_ctr($person_id);
                        $role_id =$staff_member['role_id'];
                        $role_name = getRoleName_ctr($role_id);

                        
                        echo "<tr>";
                        echo "<td>{$person_info['first_name']}</td>";
                        echo "<td>{$person_info['last_name']}</td>";
                        echo "<td>{$role_name}</td>";
                        echo "<td>{$staff_member['email']}</td>";
                        echo "<td>";
                        echo "<div>";
                        echo "<a href='single_staff_page.php?person_id={$person_id}' class = 'person_action_btn view_person_btn'><i class='fa fa-eye'></i></a>";
                        echo "<p class='person_action_text p6'>View</p>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                        
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for creating a new staff
    <div id="addStaffModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Staff</h2>
            <form id="createStaffForm">
                <div class="input_group">
                    <div class="input_item">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter first name here..." required><br><br>
                    </div>
                    
                    <div class="input_item">
                        <label for="middleName">Middle Name:</label>
                        <input type="text" id="middleName" name="middleName" placeholder="Enter middle name here..."><br><br>
                    </div>

                    <div class="input_item">    
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter last name here..." required><br><br>
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
                        <input type="email" id="email" name="email"  placeholder="Enter email here..." required><br><br>
                    </div>
                    <div class="input_item  work_rol">
                        <label for="work_role">Work Role:</label>
                        <select id="work_role" name="work_role" class="staff_work_role" required>
                            <option value="Volunteer">Volunteer</option>
                            <option value="Caregiver">Caregiver</option>
                        </select><br><br>
                    </div>

                </div>

                <div class="input_group">
                    
                    <div class="input_item">
                        <label for="primaryContact">Primary Contact:</label>
                        <input type="tel" id="primaryContact" name="primaryContact" class="contact" placeholder="Enter primary contact here..." required><br><br>
                    </div>

                    <div class="input_item">
                        <label for="secondaryContact">Secondary Contact:</label>
                        <input type="tel" id="secondaryContact" name="secondaryContact" class="contact" placeholder="Enter secondary contact here..."><br><br>
                    </div>
                </div>


                
                <div class="input_item">
                    <label for="address"> Residential Address:</label>
                    <input type="text" id="address" name="address" class="address" placeholder="Enter residential address here..." required><br><br>
                </div>
                
     
                <button type="submit">Create Staff Record</button>
            </form>
        </div>
    </div> -->
  
    <script src="../js/staff_scripts.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>

</body>

</html>