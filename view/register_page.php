<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/styles3.css">
</head>

<body id="register_body">
    <div id = "brand_section">
        <div id = "brand_logo">
            <img src="../images/logo1.png" alt="Brand Logo">
        </div>
        <div id = "brand_motto">
            <p><i>Safeguarding Records, Empowering Care</i></p>
        </div>
    </div>
    <div id = "section_divider">

    </div>
    <div id = "register_form_section">
        <form action="../actions/register_action.php" method="post">
            <h1>CREATE A PROFILE</h1>
            <div class="form-group">
    <div class="form-container">
        <div class="form-column">
            <label for="user_fname"class="register_label">FIRST NAME</label><br>
            <div id="first_name_field" class="form_group">
                <i class="fa fa-user"></i>
                <input type="text" id="user_fname" name="user_fname" placeholder="Enter first name here">
            </div>

            <label for="user_email1"class="register_label">EMAIL</label><br>
            <div id="email_field1" class="form_group">
                <i class="fa fa-envelope"></i>
                <input type="email" id="user_email1" name="user_email1" placeholder="Enter email here">
            </div>
            <p id="email_error">Email invalid! Please enter a valid email.</p>

            <label for="user_password1"class="register_label">PASSWORD</label><br>
            <div id="password_field1" class="form_group">
                <i class="fa fa-lock"></i>
                <input type="password" id="user_password1" name="user_password1" placeholder="Enter password here">
            </div>
            <p id="password_error1">Password has to be at least 8 characters.</p>
        </div>

        <div class="form-column">
            <label for="user_lname" class="register_label">LAST NAME</label><br>
            <div id="last_name_field" class="form_group">
                <i class="fa fa-user"></i>
                <input type="text" id="user_lname" name="user_lname" placeholder="Enter last name here">
            </div>

            <label for="work_roles" class="register_label">WORK ROLE</label><br>
            <div id="work_role_dropdown" class="form_group">
                <i class="fa fa-id-card"></i>
                <select name="work_role" id="work_roles">
                    <option value="Caregiver">Caregiver</option>
                    <option value="Volunteer">Volunteer</option>
                </select>
            </div>

            <label for="confirm_password" class="register_label">CONFIRM PASSWORD</label><br>
            <div id="confirm_password_field" class="form_group">
                <i class="fa fa-lock"></i>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter password here">
            </div>
            <p id="confirm_password_error">Password did not match! Please try again.</p>
        </div>
    </div>
</div>


            
<div class="button-container">
    <button id="register_btn" name = "register_btn">REGISTER</button>
</div>

            <div id="login_section">
                <br>
                <span>Already have a profile? </span>
                <a  id="login_link"href="login_page.php">Log In.</a>
            </div>
        </form>
    </div>
</body>
</html>