<?php
include '../settings/core.php';

require_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        <a href="dashboard_page.php" class = "nav_item" style="color:#6AD4DD">
            <i class ="fa fa-home"></i>
            <p>DASHBOARD</p>
        </a>

        <a href="children_page.php" class = "nav_item">
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
            <p class="heading_text">HOME</p>
            <div id = "stats_sections">

            <?php include "../actions/get_actions.php";
               
               $people_count = $staff_count + $children_count;
               ?>
                <div class = "stats_section">
                    <div class = "top_section">
                        <i class="fa fa-users"></i>
                        <span class="top_text1">
                            <span class ="section_quantity"><?php echo $people_count;?></span>
                            <span class ="section_text">People</span>
                        </span>
                    </div>
                    <div class = "bottom_section">
                        <p class="bottom_text">View records here</p>
                        <a class= "view_btn" href="children_page.php"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <?php
                if(is_admin()){
                    echo "
                    <div class='stats_section'>
                        <div class='top_section'>
                            <i class='fa fa-file-text-o'></i>
                            <span class='top_text'>
                                <span class='section_quantity'>{$documents_count}</span>
                                <span class='section_text'>Documents</span>
                            </span>
                        </div>
                        <div class='bottom_section'>
                            <p class='bottom_text'>View records here</p>
                            <a class='view_btn' href='folders_page.php'><i class='fa fa-arrow-circle-right'></i></a>
                        </div>
                    </div>
                    ";
                }
                ?>


                <div class = "stats_section">
                    <div class = "top_section">
                        <i class="fa fa-gift"></i>
                        <span class="top_text">
                            <span class ="section_quantity"><?php echo $donations_count;?></span>
                            <span class ="section_text">Donations</span>
                        </span>
                    </div>
                    <div class = "bottom_section">
                        <p class="bottom_text">View records here</p>
                        <a class= "view_btn" href="donations_page.php"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                </div>

            </div>

            <hr>

            <div id = "upcoming_events_section">
                <div class="events_top">
                    <p>Upcoming Events</p>
                    <button class="add_event_btn"><span>Add new event</span> <i class="fa fa-plus-circle"></i></button>
                </div>
                <div class="event_section">
                    <?php
                    foreach ($events as $event) {
                        $event_name = $event['event_name'];
                        $event_date = $event['event_date'];

                        $date = new DateTime($event_date);
                        $formatted_date = $date->format('jS F Y');

                        $event_time_start = $event['start_time'];
                        $timestamp_start = strtotime($event_time_start);
                        $formatted_start_time = date('H:i', $timestamp_start);

                        $event_time_end = $event['end_time'];
                        $timestamp_end = strtotime($event_time_end);
                        $formatted_end_time = date('H:i', $timestamp_end);

                        $event_location = $event['event_location'];
                        $event_id = $event['event_id'];
                    ?>
                    <div class="single_event">
                        <div class="event_details">
                            <div class="event_name">
                                <p><?php echo $event_name; ?></p>
                            </div>
                            <div class="event_division"></div>
                            <div class="event_date">
                                <i class="fa fa-calendar"></i> 
                                <div>
                                    <p class="event_day"><?php echo $formatted_date; ?></p>
                                    <p class="event_time"><span><?php echo $formatted_start_time; ?></span> - <span><?php echo $formatted_end_time; ?></span></p>
                                </div>
                            </div>
                            <div class="event_division"></div>
                            <div class="event_location">
                                <i class="fa fa-map-marker"></i> 
                                <p><?php echo $event_location; ?></p>
                            </div>
                            <div class="event_division"></div>
                            <div class="event_actions"> 
                                <div>
                                    <button class="action_btn edit_event_btn"
                                    data-event-id="<?php echo $event_id; ?>"
                                    data-event-name="<?php echo htmlspecialchars($event_name); ?>" 
                                    data-event-date="<?php echo htmlspecialchars($event_date); ?>" 
                                    data-event-location="<?php echo htmlspecialchars($event_location); ?>" 
                                    data-start-time="<?php echo htmlspecialchars($event_time_start); ?>" 
                                    data-finish-time="<?php echo htmlspecialchars($event_time_end); ?>" ><i class="fa fa-pencil"></i></button> 
                                    <p class="action_text p1">Edit</p>
                                </div>
                                <div>
                                    <button class="action_btn delete_event_btn"
                                    data-event-id="<?php echo $event_id; ?>"
                                    data-event-name="<?php echo htmlspecialchars($event_name); ?>" ><i class="fa fa-trash-o"></i></button>
                                    <p class="action_text p2">Delete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding event -->
    <div id="addEventModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Event</h2>
            <form id="eventForm" action="../actions/insert_event_action.php" method="post">
                <label for="eventName">Event Name:</label><br>
                <input type="text" id="eventName" name="eventName"  placeholder="Enter event name here..." required><br><br><br>

                <label for="eventLocation">Event Location:</label><br>
                <input type="text" id="eventLocation" name="eventLocation" placeholder="Enter location here..." required><br><br><br>

                <div class="input_group">
                    <div class="input_item">
                        <label for="eventDate">Event Date:</label>
                        <input type="date" id="eventDate" name="eventDate" required>
                    </div>
                    <div class="input_item">
                        <label for="startTime">Start Time:</label>
                        <input type="time" id="startTime" name="startTime" required>
                    </div>
                    <div class="input_item">
                        <label for="finishTime">Finish Time:</label>
                        <input type="time" id="finishTime" name="finishTime" required><br><br>
                    </div>
                </div>


                <button type="submit">Save Event</button>
            </form>
        </div>
    </div>

    <!-- Modal for editing event -->
    <div id="editEventModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Event</h2>
            <form id="editEventForm" action="../actions/update_event_action.php" method="post">
                <input type="text" name="event_id" id="event_id" hidden>

                <label for="editEventName">Event Name:</label><br>
                <input type="text" id="editEventName" name="editEventName" required><br><br><br>

                <label for="editEventLocation">Event Location:</label><br>
                <input type="text" id="editEventLocation" name="editEventLocation" required><br><br><br>

                <div class="input_group">
                    <div class="input_item">
                        <label for="editEventDate">Event Date:</label>
                        <input type="date" id="editEventDate" name="editEventDate" required>
                    </div>
                    <div class="input_item">
                        <label for="editStartTime">Start Time:</label>
                        <input type="time" id="editStartTime" name="editStartTime" required>
                    </div>
                    <div class="input_item">
                        <label for="editFinishTime">Finish Time:</label>
                        <input type="time" id="editFinishTime" name="editFinishTime" required><br><br>
                    </div>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

        <!--Modal for deleting a folder -->
        <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" id ="delete_close">&times;</span>
            <h2>Are you sure you want to delete this event?</h2>
            <p style= "text-align:center;">This will permanently delete this event from storage</p>
            <p class="delete_event_name" style="text-align:center; font-weight:bold;"><br> <span> </span> </p><br>
            <div style = "display:flex; flex-direction:row; gap:50px;">
        
            <button  id='cancel_btn'>Cancel</button>
            
            <form id="deleteForm" enctype="multipart/form-data" method="post" action="../actions/delete_event_action.php">
                <input type="text" name="delete_event_id" id="delete_event_id" hidden>
                <button type="submit" class='dlt_btn'>Delete</button>
            </form>
            </div>
        </div>
    </div>



    <script src="../js/dashboard_scripts.js" type="text/javascript"></script>
    <script src="../js/general_scripts.js" type="text/javascript"></script>
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
            width: 500,
            confirmButtonColor: "#002E35"
            });

        </script>
        <?php
            unset($_SESSION['status']);
    }
    ?>

</body>

</html>