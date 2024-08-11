<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body id="login_body">
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
    <div id = "login_form_section">
        <form class="login_form"action="../actions/login_action.php" method="post">
            <h1>LOG IN</h1>
            
            <label for="user_email" class="login_label">EMAIL</label><br>
            <div id="email_field" class="form_group">
                
                <i class = "fa fa-envelope"></i>
                <input type="email" id = "user_email" name = "user_email"placeholder = "Enter email here">
            </div>
            <p id = "email_error"> Email invalid! Please enter a valid email.</p>

            <label for="user_password"class="login_label">PASSWORD</label> <br>
            <div id="password_field"class="form_group">
                <i class = "fa fa-lock"></i>
                <input type="password" id = "user_password" name = "user_password"placeholder = "Enter password here">
            </div>
            <p id = "password_error"> Password incorrect! Please enter a valid password.</p>

            <button id = "login_btn" name = "login_btn">
                LOG IN
            </button>
            <div id="register_section">
                <br>
                <span>New here? </span>
                <a  id="register_link"href="register_page.php">Register.</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    include "../settings/core.php";
    
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