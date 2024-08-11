<?php
include '../settings/core.php';

require_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People - Staff page</title>
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
                    <a href="login_page.php">Login</a>
                    <a href="register_page.php">Register</a>
                    <a href="../actions/logout_action.php">Logout</a>
                </div>
            </div>
        </div>

        <!-- The main page section -->
        <div id ="main_section">
            <p class="heading_text">PEOPLE</p>
            
            <div class="header">
                <div>
                    <span class="single_folder_name">Staff</span>
                </div>
                        
                <div class="search_bar">
                    <input type="text" id="search_input" onkeyup="searchFunction()" placeholder="Search...">
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
            </div>
            

            <table class="people_table" id="staff_doc_table">
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