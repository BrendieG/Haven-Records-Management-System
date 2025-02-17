<?php
include '../settings/core.php';

require_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People - Children page</title>
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

        <!-- The main page section -->
        <div id ="main_section">
            <p class="heading_text">PEOPLE</p>
            
            <div class="header">
                <div>
                    <span class="single_folder_name">Children</span>
                </div>
                        
                <div class="search_bar">
                    <input type="text" id="search_input" onkeyup="searchFunction()" placeholder="Search...">
                    <i class="fa fa-search"></i>
                </div>
            </div>

            <?php include "../actions/get_actions.php";?>

            <p class="top_section_text">Total number of children: <span><?php echo $children_count;?></span></p>

            <div class="top_section">
                <div class = "page_switch">
                    <p class="focused_page">Children</p>
                    <a href="staff_page.php" class = "staff_link "><p class="unfocused_page">Staff</p></a>     
                </div>

                <?php
                    if(is_admin()){
                        echo"<button class='add_child_btn'> Add Child <i class='fa fa-plus-circle'></i></button>";
                    }
                ?>
            </div>
            

            <table class="people_table" id="children_table">
                <thead>
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>DATE OF BIRTH</th>
                        <th>INFO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($children as $child){
                        $person_id = $child['person_id'];
                        $person_info = getPersonInfoById_ctr($person_id);
                        echo "<tr>";
                        echo "<td>{$person_info['first_name']}</td>";
                        echo "<td>{$person_info['last_name']}</td>";
                        echo "<td>{$person_info['date_of_birth']}</td>";
                        echo "<td>";
                        echo "<div>";
                        echo "<a href='single_child_page.php?person_id={$person_id}' class = 'person_action_btn view_person_btn'><i class='fa fa-eye'></i></a>";
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

    <!-- Modal for adding a new child -->
    <div id="addChildModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Child</h2>
            <form id="createChildForm" action="../actions/insert_child_action.php" method="post"> 
                <div class="input_group">
                    <div class="input_item">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName"  placeholder="Enter first name here..." required ><br><br>
                    </div>
                    
                    <div class="input_item">
                        <label for="middleName">Middle Name:</label>
                        <input type="text" id="middleName" name="middleName"  placeholder="Enter middle name here..."><br><br>
                    </div>

                    <div class="input_item">    
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName"  placeholder="Enter last name here..." required><br><br>
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
                    <input type="text" id="hometown" name="hometown" class="hometown"  placeholder="Enter hometown here..." required><br><br>
                </div>
                
                <div class="input_item ">
                    <label for="child_notes">Notes:</label>
                    <textarea id="child_notes" name="child_notes"  class="child_notes" rows="4" cols="50"  placeholder="Enter notes here..."></textarea><br><br>
                </div>
     
                <button type="submit">Create Child Record</button>
            </form>

        </div>
    </div>
  
    <script src="../js/children_scripts.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>
    <script>
        function searchFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('search_input');
        filter = input.value.toUpperCase();
        table = document.getElementById("children_table");
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