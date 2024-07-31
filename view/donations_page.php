<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations</title>
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
        <a href="children_page.php" class = "nav_item">
            <i class ="fa fa-users"></i>
            <p class="nav_item_p1">PEOPLE</p>
        </a>
        <a href="folders_page.php" class = "nav_item" >
            <i class ="fa fa-file-text-o"></i>
            <p class="nav_item_p">DOCUMENTS</p>
        </a>
        <a href="donations_page.php" class = "nav_item" style="color:#6AD4DD">
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
            <p class="heading_text">DONATIONS</p>
            <div class="header">
                <div>
                    <button class="add_donation_btn"> Add New Donation Record <i class="fa fa-plus-circle"></i></button>
                </div>
                        
                <div class="search_bar">
                    <input type="text" id="search_input" placeholder="Search records...">
                    <i class="fa fa-search"></i>
                </div>
            </div>


            <table class="doc_table">
                <thead>
                    <tr>
                        <th>DONOR NAME</th>
                        <th>DONOR CONTACT</th>
                        <th>DONATION DATE</th>
                        <th>RECORDED BY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php                    
                    include "../actions/get_actions.php";
                    foreach($donations as $donation){
                        
    
                        $person_id =$donation['person_id'];

                        $donor_info = getPersonInfoById_ctr($person_id);
                        $donor_name = $donor_info['first_name'] . ' ' . $donor_info['last_name'];
                        $donor_contact = $donor_info['contact'];

                        $donor_email = $donation['donor_email'];
                        $donation_date = $donation['donation_date'];
                        $donation_items = $donation['donation_items'];
                        $donation_amount = $donation['donation_amount'];
                        $donation_notes = $donation['donation_notes'];

                        
                        $date = new DateTime($donation_date);
                        $formatted_date = $date->format('jS F Y');

                        $staff_id =$donation['uploaded_by'];
                        $staff_info = getPersonInfoByStaffId_ctr($staff_id);
                        $staff_name = $staff_info['first_name'] . ' ' . $staff_info['last_name'];



                        
                        echo "<tr>";
                        echo "<td><p>{$donor_name}</p></td>";
                        echo "<td>{$donor_contact}</td>";
                        echo "<td>{$donation_date}</td>";
                        echo "<td>{$staff_name}</td>";
                        echo "<td>";
                        echo "<div>";
                        echo "<button class = 'action_btn view_donation_btn' data-donor-name='{$donor_name}' data-contact='{$donor_contact}' data-date='{$formatted_date}' data-email='{$donor_email}' data-amount='{$donation_amount}' data-items='{$donation_items}' data-notes='{$donation_notes}'><i class='fa fa-eye'></i></button> ";
                        echo "<p class='action_text p5'>View</p>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                        
                    }
                    
                    ?>

                    
                </tbody>
            </table>
        </div>
    </div>
    <!--Modal for adding donations -->
    <div id="addDonationModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="donation_close">&times;</span>
            <h2>Add New Donation</h2>
            <form id="createDonationForm" action="../actions/insert_donation_action.php" method="post"> 
                <div class="input_group">
                    <div class="input_item">
                        <label for="firstName">Donor First Name:</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter first name here..." required><br><br>
                    </div>

                    <div class="input_item">    
                        <label for="lastName">Donor Last Name:</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter last name here..." required><br><br>
                    </div>
                    <div class="input_item ">
                        <label for="contact">Donor Contact:</label>
                        <input type="tel" id="contact" name="contact" placeholder="Enter contact here..." required><br><br>
                    </div>
                    
                </div>

                <div class=" input_group">
                    <div class="input_item">    
                        <label for="email">Donor Email:</label>
                        <input type="text" id="email" name="email" placeholder="Enter donor email here..." required><br><br>
                    </div>
                    
                    
                    <div class="input_item">
                        <label for="donation_date">Donation Date:</label>
                        <input type="date" id="donation_date" name="donation_date" class="donation_date"required><br><br>
                    </div>
                    <div class="input_item">
                        <label for="amount_donated">Amount Donated (GH Cedis):</label>
                        <input type="number" id="amount_donated" name="amount_donated" class="donation_date" placeholder="Enter amount here..."required><br><br>
                    </div>
                    
                </div>
                    
                    <div class="input_item">
                        <label for="items_donated">Items Donated (Description):</label>
                        <textarea id="items_donated" name="items_donated"  class="child_notes" rows="4" cols="50" placeholder="Enter donated items description here..."></textarea><br><br>
                    </div>
                    <div class="input_item ">
                        <label for="donation_notes">Notes:</label>
                        <textarea id="donation_notes" name="donation_notes"  class="child_notes" rows="4" cols="50" placeholder="Enter notes here..."></textarea><br><br>
                    </div>
                
     
                <button type="submit">Create Donation Record</button>
            </form>

        </div>
    </div>

    <!--Modal for viewing donation details -->
    <div id="viewDonationModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="view_donation_close">&times;</span>
            <h2>Donation Details</h2>
            <div class="personal_info">
                <div>
                    <div>
                        <p class="info_label donor_name">Donor Full Name </p>
                        <p class="donor_name"><span></span></p>
                    </div><br>
                    <div >
                        <p class="info_label ">Donation Date </p>
                        <p class="donation_date"><span></span></p>
                    </div>
                </div>

                <div>
                    <div>
                        <p class="info_label ">Donor Email </p>
                        <p class="donor_email"><span></span></p>
                    </div><br>
                    <div >
                        <p class="info_label ">Amount Donated </p>
                        <p class="donation_amount">GHc <span></span></p>
                    </div>
                </div>
                <div>
                    <div>
                        <p class="info_label">Contact </p>
                        <p class="donor_contact"><span></span></p>
                    </div><br>
                </div>
                
            </div><br>

            <div>
                <p class="info_label">Items Donated (Description) </p>
                <p class="donation_items"><span></span></p>
            </div><br>

            <div>
                <p class="info_label"> Donation Notes</p>
                <p class="donation_notes"><span></span></p>
            </div><br>

        
        
    
           

        </div>
    </div>
  
    <script src="../js/donation_scripts5.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>

</body>

</html>